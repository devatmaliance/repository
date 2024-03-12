<?php

namespace Devatmaliance\Repository\migration;

interface MigrationInterface
{
    public function create(): void;
}