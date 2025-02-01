<?php

namespace App\Http\Enums;

enum UserRole: string
{
    case user = "USER";
    case admin = "ADMIN";

    public static function getUserRole(): array
    {
        return [
            self::user, self::admin
        ];
    }
}
