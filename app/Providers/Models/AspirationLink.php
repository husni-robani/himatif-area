<?php

namespace App\Providers\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AspirationLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'token', 'link', 'email'
    ];
}
