<?php

namespace Devatmaliance\Repository\dump_parser;

use Devatmaliance\Repository\dump_parser\SqlFileHandler;

interface SqlDumpParserInterface
{
    public function setSqlFileHandler(SqlFileHandler $sqlFileHandler): void;
    public function parseCreateStructure(): void;
    public function parseInsertData(): void;
}