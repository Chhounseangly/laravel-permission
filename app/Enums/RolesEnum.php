<?php

namespace App\Enums;

enum RolesEnum: string
{

    case ADMIN = 'admin';
    case OWNER = 'owner';

    public function label(): string
    {
        return match ($this) {
            static::ADMIN => 'admin',
            static::OWNER => 'owner',
        };
    }
}
