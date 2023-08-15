<?php

namespace App\Services\Period;

use App\Models\Period;

class PeriodActiveStatusService
{

    public function getStatus(Period $period): bool
    {
        return $period->getAttribute('active');
    }

    public function changeActiveStatusTo(Period $inActivePeriod): bool
    {
        $activatedPeriod = GetPeriodService::getActivatedPeriod();

        if ($activatedPeriod !== null) {
            $activatedPeriod->active = false;
            $activatedPeriod->save();
            $inActivePeriod->active = true;
            $inActivePeriod->save();
            return true;
        }
        return false;
    }
}