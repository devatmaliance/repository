<?php

namespace Devatmaliance\Repository;
interface ActionInterface
{
    public function create(array $fields): array;
    public function update(int $id, array $fields): array;
    public function delete(int $id): array;
    public function getFields(): array;
}
