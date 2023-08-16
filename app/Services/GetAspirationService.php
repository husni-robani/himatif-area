<?php

namespace App\Services;

use App\Models\Aspiration;

class GetAspirationService
{
    public static function fromId($id)
    {
        return Aspiration::where('id', $id)->first();
    }
}