<?php
namespace App\Contracts\Services;
use App\Models\User;

interface UserServiceInterface {
    public function createUser(\Illuminate\Http\Request $request) : User;
}
