<?php

namespace Devatmaliance\Repository;

interface RepositoryClientInterface
{
    public function send(ActionInterface $action): void;
}
