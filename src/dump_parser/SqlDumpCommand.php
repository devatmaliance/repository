<?php

namespace Devatmaliance\Repository\dump_parser;

class SqlDumpCommand
{
    public const CREATE_TABLE_PATTERN = 'CREATE TABLE';
    public const DROP_TABLE_PATTERN = 'DROP TABLE';
    public const LOCK_TABLE_PATTERN = 'LOCK TABLE';
    public const INSERT_INTO_PATTERN = 'INSERT INTO';
    public const UNLOCK_TABLES_PATTERN = 'UNLOCK TABLES';
    public const AUTO_INCREMENT_PATTERN = 'AUTO_INCREMENT,';
    public const PRIMARY_KEY_PATTERN = 'PRIMARY KEY';
    public const ENGINE_INNODB_PATTERN = 'ENGINE=InnoDB';


    public function findSqlField(string $line): string
    {
        preg_match("/^`(.*)`\s/", $line, $fields);
        return $fields[1] ?? '';
    }

    public function isDropTable(string $bufferContent): bool
    {
        $pattern = self::DROP_TABLE_PATTERN;
        return preg_match("/^$pattern/", $bufferContent);
    }

    public function isCreateTable(string $bufferContent): bool
    {
        $pattern = self::CREATE_TABLE_PATTERN;
        return preg_match("/^$pattern/", $bufferContent);
    }

    public function isInsertInto(string $bufferContent): bool
    {
        $pattern = self::INSERT_INTO_PATTERN;
        return preg_match("/^$pattern/", $bufferContent);
    }

    public function isLockTable(string $bufferContent): bool
    {
        $pattern = self::LOCK_TABLE_PATTERN;
        return preg_match("/^$pattern/", $bufferContent);
    }

    public function isUnLockTable(string $bufferContent): bool
    {
        $pattern = self::UNLOCK_TABLES_PATTERN;
        return preg_match("/^$pattern/", $bufferContent);
    }

    public function addByPattern(string $line, string $pattern): string
    {
        if (str_contains($line, $pattern)) {
            return $line;
        }
        return '';
    }

    public function removeAutoIncrement(string $line, array $tableProperties): string
    {
        if (str_contains($line, self::AUTO_INCREMENT_PATTERN) && $tableProperties['useAutoIncrement'] === false) {
            return str_replace(self::AUTO_INCREMENT_PATTERN, ',', $line);
        }

        return $line;
    }

    public function renameSqlField(string $line, string $sqlField, array $tableProperties): string
    {
        return str_replace($sqlField, $tableProperties['fields'][$sqlField], $line);
    }

    public function findSqlInsertValues($bufferContent): array
    {
        preg_match_all("/\((.*?)\)([,;])/", $bufferContent, $matches);
        return $matches[1] ?? [];
    }

    public function replaceSqlTableName(string $content, string $sqlTableName, array $tableProperties): string
    {
        return str_replace($sqlTableName, $tableProperties['table'], $content);
    }

    public function findSqlTableName(string $bufferContent): string
    {
        preg_match("/`(.*)`/", $bufferContent, $matches);
        return $matches[1] ?? '';
    }

    public function addPrimaryKey(string $line): string
    {
        if (str_contains($line, self::PRIMARY_KEY_PATTERN)) {
            return str_replace(',', '', $line);
        }
        return '';
    }
}