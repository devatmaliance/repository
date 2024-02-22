<?php

namespace Devatmaliance\Repository;
interface ActionDTOInterface
{
    public function getOperation(): string;
    public function getEntity(): string;
    public function getFields(): array;
    public function setOperation(string $operation): void;
    public function setEntity(string $entity): void;
    public function setFields(array $action): void;
}
