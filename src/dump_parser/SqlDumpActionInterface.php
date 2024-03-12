<?php

namespace Devatmaliance\Repository\dump_parser;

interface SqlDumpActionInterface
{
    public function create(): string;
    public function drop(): string;
    public function lock(): string;
    public function unlock(): string;
    public function insert(): string;
    public function createStructure(array $buffer): string;
    public function insertData(array $buffer): string;
    public function setBuffer(array $buffer);
}