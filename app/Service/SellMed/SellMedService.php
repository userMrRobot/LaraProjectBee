<?php

namespace App\Service\SellMed;

use Illuminate\Support\Facades\Hash;

class SellMedService
{

    public function update($data,$money,$bee)
    {

        if (((int)$data['medObmen'] > $bee->med_all) or ((int)$data['medObmen'] < 1)) {

            return false;
        }

        $data['med'] = $bee->med_all - ((int)$data['medObmen']);
        $data['silver'] = $money->silver + ((int) floor((int)$data['medObmen'] / 100));
        unset($data['medObmen']);
        return $data;
    }


}
