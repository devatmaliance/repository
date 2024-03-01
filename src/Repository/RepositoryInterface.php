<?php

namespace Devatmaliance\Repository\Repository;

use Devatmaliance\Repository\Repository\RepositoryEntityInterface;
use Devatmaliance\Repository\Action\ActionDTOInterface;

interface RepositoryInterface
{
    public function create(): array;
    public function update(): array;
    public function delete(): array;
    public function init(ActionDTOInterface $actionDTO, RepositoryEntityInterface $repositoryEntity): void;
}
