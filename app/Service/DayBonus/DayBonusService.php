<?php

namespace App\Service\DayBonus;



use Carbon\Carbon;

class DayBonusService
{

    /**
     * Проверяет, можно ли получить бонус.
     */
    public function canClaimBonus($date): bool
    {
        $lastBonusDate = Carbon::createFromTimestampUTC($date->bonus_date)
            ->setTimezone(config('app.timezone'));

        if ((int) $date->bonus_date === 0 or $lastBonusDate->diffInDays(Carbon::now(),true) >= 1) {
            return true;
        }

        return false;

    }

    /**
     * Обновляет бонус и баланс пользователя.
     */
    public function updateBonus($date, $money): void
    {
        $dateNow = Carbon::now()->timestamp;
        $bonus = random_int(1000, 10000);

        $date->update([
            'bonus_date' => $dateNow,
        ]);

        $money->update([
            'silver' => $money->silver + $bonus,
            'bonus' => $bonus,
        ]);
    }

}
