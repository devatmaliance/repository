<?php

namespace Devatmaliance\Repository\dump_parser;

use Devatmaliance\Repository\dump_parser\SqlDumpActionInterface;
use Devatmaliance\Repository\dump_parser\MysqlDumpCommand;

class MysqlDumpAction implements SqlDumpActionInterface
{

    private MysqlDumpCommand $sqlDumpCommand;
    private array $config;

    private array $usedColumns = [];
    private array $buffer = [];
    private string $sqlTableName = '';
    private array $tableProperties = [];
    private bool $isEmptyConfigTablePropertiesFields = true;
    private string $bufferContent = '';

    public function __construct(MysqlDumpCommand $sqlDumpCommand, array $config)
    {
        $this->sqlDumpCommand = $sqlDumpCommand;
        $this->config = $config;
    }

    public function drop(): string
    {
        $sqlTableName = $this->sqlDumpCommand->findSqlTableName($this->bufferContent);

        if (!$this->isConfigTableExists($sqlTableName)) {
            return '';
        }

        $this->setProperties($sqlTableName);

        return $this->replaceSqlTableName($this->bufferContent, $sqlTableName);
    }

    public function lock(): string
    {
        $sqlTableName = $this->sqlDumpCommand->findSqlTableName($this->bufferContent);

        if (!$this->isConfigTableExists($sqlTableName)) {
            return '';
        }

        $this->setProperties($sqlTableName);
        return $this->replaceSqlTableName($this->bufferContent, $sqlTableName);
    }

    public function unlock(): string
    {
        return $this->bufferContent;
    }

    public function create(): string
    {
        $sqlTableName = $this->sqlDumpCommand->findSqlTableName($this->bufferContent);
        $temporaryBuffer = '';

        if (!$this->isConfigTableExists($sqlTableName)) {
            return '';
        }

        if ($this->isEmptyConfigTablePropertiesFields) {
            return $this->replaceSqlTableName($this->bufferContent, $sqlTableName);
        }

        foreach ($this->buffer as $index => $line) {
            $line = trim($line);

            if ($index === 0) {
                $temporaryBuffer .= $this->replaceSqlTableName($line, $sqlTableName);;
            }

            $sqlField = $this->sqlDumpCommand->findSqlField($line);

            if (empty($sqlField)) {
                $temporaryBuffer .= $this->sqlDumpCommand->addPrimaryKey($line);
                $temporaryBuffer .= $this->sqlDumpCommand->addByPattern($line, MysqlDumpCommand::ENGINE_INNODB_PATTERN);
            } else {
                if (isset($this->tableProperties['fields'][$sqlField])) {
                    $line = $this->sqlDumpCommand->renameSqlField($line, $sqlField, $this->tableProperties);
                    $line = $this->sqlDumpCommand->removeAutoIncrement($line, $this->tableProperties);
                    $this->usedColumns[$this->sqlTableName][] = true;

                    $temporaryBuffer .= $line;

                } else {
                    $this->usedColumns[$this->sqlTableName][] = false;
                }
            }
        }
        return $temporaryBuffer;
    }

    public function insert(): string
    {
        $sqlTableName = $this->sqlDumpCommand->findSqlTableName($this->bufferContent);

        if (!$this->isConfigTableExists($sqlTableName)) {
            return '';
        }

        if ($this->isEmptyConfigTablePropertiesFields) {
            return $this->replaceSqlTableName($this->bufferContent, $sqlTableName);
        }

        $temporaryBuffer = MysqlDumpCommand::INSERT_INTO_PATTERN . '`' . $this->tableProperties['table'] . '` VALUES ';
        $sqlInsertValuesRows = $this->sqlDumpCommand->findSqlInsertValues($this->bufferContent);

        if (!$sqlInsertValuesRows) {
            return '';
        }

        foreach ($sqlInsertValuesRows as $count => $values) {
            $values = $this->removeCommaAsLastSymbol($values);
            $valuesArray = explode(',', $values);

            $normalizedValues = [];
            $isStartOfSplittedLine = false;
            $isEndOfSplittedLine = false;
            $startIndex = 0;
            $index = 0;

            foreach ($valuesArray as $value) {
                if (preg_match("/^'[^']+$/", $value)) {
                    $isStartOfSplittedLine = true;
                    $startIndex = $index;
                }
                if (preg_match("/^[^']+'$/", $value)) {
                    $isStartOfSplittedLine = false;
                    $isEndOfSplittedLine = true;
                    $index++;
                }

                if ($isStartOfSplittedLine || $isEndOfSplittedLine) {
                    isset($normalizedValues[$startIndex]) ? $normalizedValues[$startIndex] .= $value : $normalizedValues[$startIndex] = $value;
                    $isEndOfSplittedLine = false;
                } else {
                    $normalizedValues[] = $value;
                    $index++;
                }
            }

            foreach ($normalizedValues as $index => $value) {
                if ($this->usedColumns[$this->sqlTableName][$index] === false) {
                    unset($normalizedValues[$index]);
                }
            }

            $temporaryBuffer .= '(' . implode(',', $normalizedValues) . ')';
            $temporaryBuffer .= (count($sqlInsertValuesRows) === ($count + 1)) ? ';' : ',';
        }
        return $temporaryBuffer;
    }

    public function isConfigTableExists(string $sqlTableName): bool
    {
        return isset($this->config['tables'][$sqlTableName]);
    }

    public function setBuffer(array $buffer)
    {
        $this->buffer = $buffer;
        $this->bufferContent = rtrim(trim(implode(' ', $buffer)), '\n');
    }

    public function createStructure(array $buffer): string
    {
        $this->setBuffer($buffer);

        if ($this->sqlDumpCommand->isDropTable($this->bufferContent)) {
            return $this->drop();
        }
        if ($this->sqlDumpCommand->isCreateTable($this->bufferContent)) {
            return $this->create();
        }

        return '';
    }

    public function insertData(array $buffer): string
    {
        $this->setBuffer($buffer);

        if ($this->sqlDumpCommand->isLockTable($this->bufferContent)) {
            return $this->lock();
        }
        if ($this->sqlDumpCommand->isInsertInto($this->bufferContent)) {
            return $this->insert();
        }
        if ($this->sqlDumpCommand->isUnLockTable($this->bufferContent)) {
            return $this->unlock();
        }

        return '';
    }

    private function replaceSqlTableName(string $content, string $sqlTableName): string
    {
        return $this->sqlDumpCommand->replaceSqlTableName($content, $sqlTableName, $this->tableProperties);
    }

    private function removeCommaAsLastSymbol($values): string
    {
        preg_match_all("/'(.*?)'/", $values, $matches);

        foreach ($matches[1] as $line) {
            $values = str_replace($line, rtrim(trim($line), ','), $values);
        }

        return $values;
    }

    private function setProperties(string $sqlTableName): void
    {
        $this->sqlTableName = $sqlTableName;
        $this->tableProperties = $this->config['tables'][$this->sqlTableName];
        $this->isEmptyConfigTablePropertiesFields = empty($this->tableProperties['fields']);
    }
}