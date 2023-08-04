<?php

namespace App\Enums;

enum UserRoleEnum : string
{

    case ADMIN = 'Admin';
    case PERIOD_ADMIN = 'Admin Period';
    case USER = 'User';
}
