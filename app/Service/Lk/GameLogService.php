<?php

namespace App\Service\Lk;

use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class GameLogService
{
    /**
     * Проверяет, есть ли активные пчёлы
     */
    private function hasBees($bee){
       return !empty($bee->bee_1) or !empty($bee->bee_2) or !empty($bee->bee_3);

    }

    /**
     * Устанавливает время последней активности, если оно не задано
     */
    private function initializeTimeLast($bee): void
    {
        if ((int) $bee-> time_last === 0) {
            $bee->update(['time_last' => time()]);
        }
    }

    /**
     * Рассчитывает и обновляет добычу мёда
     */
    private function calculateMedProduction($bee): void
    {
        $now = time();
        $elapsedTime = $now - (int)$bee->time_last;
        $minutesInSeconds = 60;

        if ($elapsedTime >= $minutesInSeconds) {
            $count = floor($elapsedTime / $minutesInSeconds);
            $totalmed = (int)$bee->med_all + ((int)$bee->med * $count);

            $bee->update([
                'med_all' => $totalmed,
                'time_last' => $now,
            ]);
        }
    }

    public function updateBeeProgress($bee): void
    {

        if ($this->hasBees($bee)) {
            $this->initializeTimeLast($bee);
            $this->calculateMedProduction($bee);
        }
    }

    public function checkAndUpdateCreditStart($date)
    {
        if ($date->credit_start !== null) {
            $currentDate = Carbon::now();
            $creditEnd = Carbon::parse($date->credit_end);

            if ($currentDate->isBefore($creditEnd)) {
                $date->update([
                    'credit_start' => $currentDate->toDateTimeString(),
                ]);
            } else {
                Session::flash('error', 'Погасите кредит');
                return redirect()->route('credit.down.edit', Auth::id());
            }
        }
    }

}
