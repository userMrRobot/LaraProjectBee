<?php

namespace App\Service\Credit;

use Carbon\Carbon;


class CreditService
{

    public function updateUp($date, $data, $money)
    {
        if ($date->credit_start !== null) {
            return 0;

        }
        if (((int)$data['moneyObmen'] > 100000) or ((int)$data['moneyObmen'] < 1)) {
            return 1;

        }

        $data['date_credit_start'] = Carbon::now()->toDateTimeString();
        $data['date_credit_end'] = Carbon::now()->addDays(7)->toDateTimeString();

        $data['silver'] = (int)$money->silver + (int)$data['moneyObmen'];
        $data['credit_up'] = (int)$data['moneyObmen'];
        $data['credit_down'] = (int)floor((int)$data['moneyObmen'] * 1.1);
        return $data;
    }

    public function updateDown($data, $money)
    {
        if ((int) $data['moneyObmen'] !== (int) $money->credit_down) {
            return 0;
        }

        if ((int) $data['moneyObmen'] > (int) $money->silver) {
            return 1;
        }

        $data['silver'] = $money->silver - (int) $data['moneyObmen'];
        return $data;
    }


}
