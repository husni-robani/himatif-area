<?php

namespace App\Contracts\Services\Period;


interface GetPeriodIdInterface
{
    public function getIdFromYear($year): string;
}