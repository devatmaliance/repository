<?php

namespace Devatmaliance\Repository;
interface ActionInterface
{
    public function create(array $fields): array;
    public function update(array $fields): array;
    public function delete(array $fields): array;
    public function getFields(): array;
}
