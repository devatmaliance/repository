<?php

namespace Devatmaliance\Repository\action;

class ActionType
{
    public const CREATE = 'create';
    public const UPDATE = 'update';
    public const DELETE = 'delete';
    public const GET = 'get';

    public static function getTypes(): array
    {
        return [
            self::CREATE,
            self::UPDATE,
            self::DELETE,
            self::GET,
        ];
    }
}
