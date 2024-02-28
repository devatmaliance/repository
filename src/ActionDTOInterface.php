<?php

namespace Devatmaliance\Repository;

interface ActionDTOInterface
{
    public function getOperation(): string;
    public function getEntity(): string;
    public function getFields(): array;
    public function getSearchParam(): string;
    public function getParams(): array;
    public function setOperation(string $operation): void;
    public function setEntity(string $entity): void;
    public function setFields(array $fields): void;
    public function setSearchParam(string $param): void;
}
