<?php

namespace App\Services\Period;

use App\Contracts\Services\Period\GetPeriodIdInterface;
use App\Models\Period;

class GetPeriodId implements GetPeriodIdInterface
{
    public function getIdFromYear($year): string
    {

        return Period::where('year', $year)->first()->id;
    }
}