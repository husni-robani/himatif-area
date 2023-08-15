<?php

namespace App\Services\Period;

use App\Models\Period;

class GetPeriodService
{
    public static function getFromYear($year): Period
    {

        return Period::where('year', $year)->first();
    }

    public static function getActivatedPeriod()
    {
        if (Period::where('active', true)->exists()) {
            return Period::where('active', true)->first();
        }
        return null;
    }

}