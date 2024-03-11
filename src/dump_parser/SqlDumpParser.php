<?php

namespace Devatmaliance\Repository\dump_parser;

use SplFileObject;
use Devatmaliance\Repository\dump_parser\SqlDumpActionInterface;
use Devatmaliance\Repository\dump_parser\SqlFileHandler;

class SqlDumpParser
{
    private SplFileObject $file;

    private SqlDumpActionInterface $sqlDumpAction;
    private SqlFileHandler $sqlFileHandler;

    public function __construct(string $sqlFile, SqlDumpActionInterface $sqlDumpAction, SqlFileHandler $sqlFileHandler)
    {
        $this->file = new SplFileObject($sqlFile);
        $this->sqlDumpAction = $sqlDumpAction;
        $this->sqlFileHandler = $sqlFileHandler;
    }

    public function parse(): void
    {
        foreach ($this->buffer() as $buffer) {
            $content = $this->sqlDumpAction->execute($buffer);

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

            if (!strpos($line, ';')) {
                continue;
            }
            $temp = $buffer;
            $buffer = [];

            yield $temp;
        }
    }
}