<?php

namespace console\components\dump_parser;

interface SqlDumpActionInterface
{
    public function create(): string;
    public function drop(): string;
    public function lock(): string;
    public function unlock(): string;
    public function insert(): string;
    public function execute(array $buffer): string;
    public function setBuffer(array $buffer);
}