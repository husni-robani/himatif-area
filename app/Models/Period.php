<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Period extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
      'vision', 'mission'
    ];

    public function users() : HasMany
    {
        return $this->hasMany(User::class);
    }
}
