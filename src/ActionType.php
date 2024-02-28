<?php

namespace Devatmaliance\Repository;

class ActionType
{
    public const CREATE = 'create';
    public const UPDATE = 'update';
    public const DELETE = 'delete';

    public function getTypes(): array
    {
        return [
            self::CREATE,
            self::UPDATE,
            self::DELETE,
        ];
    }
}
