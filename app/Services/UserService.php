<?php

namespace App\Services;

use App\Contracts\Services\UserServiceInterface;
use App\Enums\UserRoleEnum;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class UserService
{
    private User $user;
    private string $password;

    public function __construct(User $user = new User())
    {
        $this->user = $user;
    }

    public function createUser(Request $request, UserRoleEnum $role): User
    {
        //Create User
        $createUserRequest = $request->only(['name', 'period_id', 'email', 'password', 'npm', 'position', 'phone', 'image']);
        $user = User::create($createUserRequest);

        $this->user = $user;

        //Create Period_User
        $user->periodUser()->create([
            'role' => $role,
            'period_id' => $user->period_id
        ]);
        return $user;
    }

    public function generateRandomPassword($length = 10): string
    {
        $password = Str::random($length);
        $this->password = $password;
        return $password;
    }

    public function getPassword()
    {
        return $this->password;
    }
}
