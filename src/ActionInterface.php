<?php

namespace Devatmaliance\Repository;

interface ActionInterface
{
    public function create(array $fields): void;
    public function update(array $fields): void;
    public function delete(int $id): void;
    public function getParams(): array;
    public function getMethod(): string;
}
