<?php

namespace App\Service\Obmen;

use Illuminate\Support\Facades\Hash;

class ObmenService
{

    public function UpdateSilverOnGold($data, $user, $money)
    {

        // код для отдельной ф-и 1го класса
        if (((int)$data['moneyObmen'] > $money->gold_max) or ((int)$data['moneyObmen'] < 1)) {

            return false;
        } else {
            $data['silver'] = $money->silver - ((int)$data['moneyObmen'] * 1000);
            $data['gold'] = $money->gold + (int)$data['moneyObmen'];
            unset($data['moneyObmen']);
            return $data;
        }



    }

    public function UpdateGoldOnRub($data, $user, $money)
    {

        // код для отдельной ф-и 1го класса
        if (((int)$data['moneyObmen'] > $money->rub_max) or ((int)$data['moneyObmen'] < 1)) {

            return false;
        } else {
            $data['gold'] = $money->gold - ((int)$data['moneyObmen'] * 100);
            $data['rub_down'] = $money->rub_down + (int)$data['moneyObmen'];
            unset($data['moneyObmen']);
            return $data;
        }



    }


}
