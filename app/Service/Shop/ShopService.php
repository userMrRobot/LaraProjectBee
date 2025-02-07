<?php

namespace App\Service\Shop;



class ShopService
{
    public function UpdateBee1($data, $bee, $money){

        if (((int) $data['countBee'] > $bee->max_bee_1) or ((int) $data['countBee'] < 1)) {

            return false;
        }
        else{
            $data['silver'] = $money->silver - ((int)$data['countBee'] * 500);
            $data['bee1'] = $bee->bee_1 + (int)$data['countBee'];
            $data['med'] = $bee->med + ((int)$data['countBee'] * 1);
            unset($data['countBee']);
            return $data;
        }

    }

    public function UpdateBee2($data, $bee, $money){

        if (((int) $data['countBee'] > $bee->max_bee_2) or ((int) $data['countBee'] < 1)) {

            return false;
        }
        else{
            $data['silver'] = $money->silver - ((int)$data['countBee'] * 5000);
            $data['bee2'] = $bee->bee_2 + (int)$data['countBee'];
            $data['med'] = $bee->med + ((int)$data['countBee'] * 10);
            unset($data['countBee']);
            return $data;
        }
    }
    public function UpdateBee3($data, $bee, $money){
        if (((int) $data['countBee'] > $bee->max_bee_3) or ((int) $data['countBee'] < 1)) {

            return false;
        }
        else{
            $data['gold'] = $money->gold - ((int)$data['countBee'] * 50);
            $data['bee3'] = $bee->bee_3 + (int)$data['countBee'];
            $data['med'] = $bee->med + ((int)$data['countBee'] * 50);
            unset($data['countBee']);
            return $data;
        }
    }

}
