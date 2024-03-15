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
    private array $tableProperties = [];
    private bool $isEmptyConfigTablePropertiesFields = true;
    private string $bufferContent = '';
    private string $sqlTableName = '';

    public function __construct(MysqlDumpCommand $sqlDumpCommand, array $config)
    {
        $this->sqlDumpCommand = $sqlDumpCommand;
        $this->config = $config;
    }

    public function drop(): string
    {
        $sqlTableName = $this->sqlDumpCommand->findSqlTableName($this->bufferContent, MysqlDumpCommand::DROP_TABLE_PATTERN);

        if (!$this->isConfigTableExists($sqlTableName)) {
            return '';
        }

        $this->setProperties($sqlTableName);

        return $this->replaceSqlTableName($this->bufferContent, $sqlTableName);
    }

    public function lock(): string
    {
        $sqlTableName = $this->sqlDumpCommand->findSqlTableName($this->bufferContent, MysqlDumpCommand::LOCK_TABLE_PATTERN);

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
        $sqlTableName = $this->sqlDumpCommand->findSqlTableName($this->bufferContent, MysqlDumpCommand::CREATE_TABLE_PATTERN);
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
                $sqlField = $this->sqlDumpCommand->findSqlFieldInKeyAndConstraint($line);

                if ($this->checkIfFieldInConfigFields($sqlField)) {
                    $line = $this->sqlDumpCommand->renameSqlField($line, $sqlField, $this->tableProperties);
                    if ($renamed = $this->findAndRenameTableInConstraint($line)) {
                        $temporaryBuffer .= $renamed;
                    } else {
                        $temporaryBuffer .= $line;
                    }
                }

                if (!empty($line = $this->sqlDumpCommand->addByPattern($line, MysqlDumpCommand::ENGINE_INNODB_PATTERN))) {
                    $temporaryBuffer = rtrim($temporaryBuffer, ',');
                    $temporaryBuffer .= $line;
                }

            } else {
                if (isset($this->tableProperties['fields'][$sqlField])) {
                    $line = $this->sqlDumpCommand->renameSqlField($line, $sqlField, $this->tableProperties);
                    $line = $this->sqlDumpCommand->removeAutoIncrement($line, $this->tableProperties);
                    $this->usedColumns[$sqlTableName][] = true;

                    $temporaryBuffer .= $line;

                } else {
                    $this->usedColumns[$sqlTableName][] = false;
                }
            }
        }

        return $temporaryBuffer;
    }

    public function insert(): string
    {
        $sqlTableName = $this->sqlDumpCommand->findSqlTableName($this->bufferContent, MysqlDumpCommand::INSERT_INTO_PATTERN);

        if (!$this->isConfigTableExists($sqlTableName)) {
            return '';
        }

        if ($this->isEmptyConfigTablePropertiesFields) {
            return $this->replaceSqlTableName($this->bufferContent, $sqlTableName);
        }

        $temporaryBuffer = MysqlDumpCommand::INSERT_INTO_PATTERN . '`' . $this->tableProperties['table'] . '` VALUES ';

        $this->removeCommasBetweenSingleQuotes($sqlTableName);

        $sqlInsertValuesRows = $this->sqlDumpCommand->findSqlInsertValues($this->bufferContent);

        if (!$sqlInsertValuesRows) {
            return '';
        }

        foreach ($sqlInsertValuesRows as $count => $values) {
            $values = $this->removeNotAllowedSymbols($values);
            $valuesArray = explode(',', $values);

            $normalizedValues = [];
            $isStartOfSplittedLine = false;
            $isEndOfSplittedLine = false;
            $startIndex = 0;
            $index = 0;

            foreach ($valuesArray as $row => $value) {
                if (preg_match("/^'[^']+$/", $value)) {
                    $isStartOfSplittedLine = true;
                    $startIndex = $index;
                }
                if (preg_match("/^[^']+'$/", $value)) {
                    $isStartOfSplittedLine = false;
                    $isEndOfSplittedLine = true;
                    $index++;
                }

                if (strlen($value) === 1 && str_contains("'", $value)) {
                    if ($value === $valuesArray[$row + 1]) {
                        $normalizedValues[] = "''";
                        $index++;
                    }
                } else if ($isStartOfSplittedLine || $isEndOfSplittedLine) {
                    isset($normalizedValues[$startIndex]) ? $normalizedValues[$startIndex] .= $value : $normalizedValues[$startIndex] = $value;
                    $isEndOfSplittedLine = false;
                } else {
                    $normalizedValues[] = $value;
                    $index++;
                }
            }

            foreach ($normalizedValues as $index => $value) {
                if ($this->usedColumns[$sqlTableName][$index] === false) {
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

    private function replaceSqlTableName(string $content, string $sqlTableName, array $tableProperties = []): string
    {
        $tableProperties = $tableProperties ? $tableProperties : $this->tableProperties;
        return $this->sqlDumpCommand->replaceSqlTableName($content, $sqlTableName, $tableProperties);
    }
    private function removeCommasBetweenSingleQuotes(): void
    {
        preg_match_all("/'(.*?)'[),]/", $this->bufferContent, $matches);

        foreach ($matches[1] as $line) {
            if (strlen($line) === 1 && str_contains(',', $line)) {
                continue;
            }
            $this->bufferContent = str_replace($line, str_replace([',', ';'], ' ', $line), $this->bufferContent);
        }
    }

    private function removeNotAllowedSymbols($values): string
    {
        $values = str_replace("\'", '', $values);

        preg_match_all("/'(.*?)'/", $values, $matches);
        foreach ($matches[1] as $line) {
            if (strlen($line) === 1 && str_contains(',', $line)) {
                continue;
            }
            $values = str_replace($line, trim($line, " ,"), $values);
        }

        return $values;
    }

    private function setProperties(string $sqlTableName): void
    {
        $this->sqlTableName = $sqlTableName;
        $this->tableProperties = $this->config['tables'][$sqlTableName];
        $this->isEmptyConfigTablePropertiesFields = empty($this->tableProperties['fields']);
    }

    private function checkIfFieldInConfigFields(string $field): bool
    {
        return isset($this->tableProperties['fields'][$field]);
    }

    private function findAndRenameTableInConstraint(string $line): ?string
    {
        if ($sqlTableName = $this->sqlDumpCommand->findTableNameInConstraint($line)) {
            $tableProperties = $this->config['tables'][$sqlTableName] ?? [];
            return $this->replaceSqlTableName($line, $sqlTableName, $tableProperties);
        }
        return null;
    }
}