<?php

namespace Devatmaliance\Repository\Repository;

interface RepositoryClientInterface
{
    public function send(ActionInterface $action);
}
