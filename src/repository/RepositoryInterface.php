<?php

namespace Devatmaliance\Repository\repository;

use Devatmaliance\Repository\repository\RepositoryEntityInterface;
use Devatmaliance\Repository\action\ActionDTOInterface;

interface RepositoryInterface
{
    public function create(): array;
    public function update(): array;
    public function delete(): array;
    public function init(ActionDTOInterface $actionDTO, RepositoryEntityInterface $repositoryEntity): void;
}
