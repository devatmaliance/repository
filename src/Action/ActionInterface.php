<?php

namespace Devatmaliance\Repository\Action;

use Devatmaliance\Repository\Action\ActionDTOInterface;

interface ActionInterface
{
    public function create(array $params): void;
    public function update(array $params): void;
    public function delete(array $params): void;
    public function getParams(): array;
    public function getMethod(): string;
}
