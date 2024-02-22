<?php

namespace src;

interface RepositoryClientInterface
{
    public function send(ActionInterface $action): void;
}