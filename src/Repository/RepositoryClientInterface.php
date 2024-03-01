<?php

namespace Devatmaliance\Repository\Repository;

use Devatmaliance\Repository\Action\ActionInterface;

interface RepositoryClientInterface
{
    public function send(ActionInterface $action);
}
