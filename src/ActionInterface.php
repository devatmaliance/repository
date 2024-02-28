<?php

namespace Devatmaliance\Repository;

use ActionDTOInterface;

interface ActionInterface
{
    public function create(array $fields): void;
    public function update(array $fields): void;
    public function delete(array $fileds): void;
    public function getParams(): array;
    public function setParams(ActionDTOInterface $actionDTO): void;
    public function getMethod(): string;
}
