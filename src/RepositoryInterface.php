<?php

namespace src;

interface RepositoryInterface
{
    public function create(): void;
    public function update(): void;
    public function delete(): void;
}