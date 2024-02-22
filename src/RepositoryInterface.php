<?php

namespace Devatmaliance\Repository;

interface RepositoryInterface
{
    public function create(): void;
    public function update(): void;
    public function delete(): void;
}
