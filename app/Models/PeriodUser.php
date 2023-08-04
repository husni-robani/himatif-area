<?php

namespace App\Models;

use App\Enums\UserRoleEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PeriodUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'role', 'period_id'
    ];

    protected $casts = [
        'role' => UserRoleEnum::class
    ];

}
