<?php

namespace Devatmaliance\Repository;
interface ActionDTOInterface
{
    public function getOperation(): string;
    public function getEntity(): string;
    public function getFields(): array;
    public function setOperation(string $operation): string;
    public function setEntity(string $entity): string;
    public function setFields(array $action): string;
}
