<?php

namespace Devatmaliance\Repository;
interface ActionInterface
{
    public function create(array $fields): void;
    public function update(int $id, array $fields): void;
    public function delete(int $id): void;
    public function getFields(): array;
}
