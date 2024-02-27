<?php

namespace Devatmaliance\Repository;

interface RepositoryInterface
{
    public function create(): array;
    public function update(): array;
    public function delete(): array;
}
