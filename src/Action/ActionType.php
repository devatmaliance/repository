<?php

namespace Devatmaliance\Repository\Action;

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