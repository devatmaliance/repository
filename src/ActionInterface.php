<?php

namespace Devatmaliance\Repository;
interface ActionInterface
{
    public function create(array $fields): void;
    public function update(array $fields): void;
    public function delete(array $fields): void;
}
