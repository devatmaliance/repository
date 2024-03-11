<?php

namespace Devatmaliance\Repository\repository;

use Devatmaliance\Repository\action\ActionInterface;

interface RepositoryClientInterface
{
    public function send(ActionInterface $action);
}
