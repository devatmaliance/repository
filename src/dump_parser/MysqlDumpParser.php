<?php

namespace Devatmaliance\Repository\dump_parser;

use Devatmaliance\Repository\dump_parser\SqlFileHandler;
use SplFileObject;
use Devatmaliance\Repository\dump_parser\SqlDumpActionInterface;
use Devatmaliance\Repository\dump_parser\SqlDumpParserInterface;

class MysqlDumpParser implements SqlDumpParserInterface
{
    private SplFileObject $file;

    private SqlDumpActionInterface $sqlDumpAction;
    private ?SqlFileHandler $sqlFileHandler = null;

    public function __construct(string $sqlFilePath, SqlDumpActionInterface $sqlDumpAction)
    {
        $this->file = new SplFileObject($sqlFilePath);
        $this->sqlDumpAction = $sqlDumpAction;
    }

    public function setSqlFileHandler(SqlFileHandler $sqlFileHandler): void
    {
        $this->sqlFileHandler = $sqlFileHandler;
    }

    public function parseCreateStructure(): void
    {
        $this->assertSqlFileHandlerSet();

        foreach ($this->buffer() as $buffer) {
            $content = $this->sqlDumpAction->createStructure($buffer);

            if (empty($content)) {
                continue;
            }

            $this->sqlFileHandler->write($content);
        }
    }

    public function parseInsertData(): void
    {
        $this->assertSqlFileHandlerSet();

        foreach ($this->buffer() as $buffer) {
            $content = $this->sqlDumpAction->insertData($buffer);

            if (empty($content)) {
                continue;
            }

            $this->sqlFileHandler->write($content);
        }
    }

    private function buffer(): \Generator
    {
        $buffer = [];
        while (!$this->file->eof()) {
            $line = $this->file->fgets();

            if ((str_contains($line, '/*') && str_contains($line, '*/')) || preg_match("/^--/", $line)) {
                continue;
            }

            $buffer[] = $line;

            if (!strpos($line, ";\n")) {
                continue;
            }
            $temp = $buffer;
            $buffer = [];

            yield $temp;
        }

        $this->file->rewind();
    }

    private function assertSqlFileHandlerSet(): void
    {
        if ($this->sqlFileHandler === null) {
            throw new \Exception('Нужно установить SqlFileHadler дя парсинга');
        }
    }
}