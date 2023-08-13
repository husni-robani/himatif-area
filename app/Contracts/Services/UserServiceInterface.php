<?php

namespace App\Contracts\Services;

use App\Enums\UserRoleEnum;
use App\Models\User;

interface UserServiceInterface
{
    public function createUser(\Illuminate\Http\Request $request, UserRoleEnum $role): User;
}
