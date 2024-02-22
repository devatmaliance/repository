<?php

namespace src;
interface ActionInterface
{
    public function create(array $fields): void;
    public function update(int $id, array $fields): void;
    public function delete($id): void;
}