<?php

namespace App\Http\Controllers\Shop\Bee2;

use App\Http\Controllers\Shop\BaseShopController;
use App\Http\Requests\Shop\ShopBeeRequest;
use App\Models\User;

class UpdateController extends BaseShopController
{

    public function __invoke(User $user, ShopBeeRequest $request)
{

    $money = $user->money;
    $bee = $user->bee;
    $data = $request->validated();
    $data = $this->service->UpdateBee2($data, $bee, $money);

    if (!$data) {
        session()->flash('error', 'Неверное кол-во пчел на покупку');
        return redirect()->route('shop.bee2.edit', $user->id);

    }

    $money->update([
        'silver' => $data['silver'],
    ]);

    $bee->update([
        'bee_2' => $data['bee2'],
        'med' => $data['med'],
    ]);


    session()->flash('down', 'Пчелы успешно приобретены');
    return redirect()->route('lk.index');
}

}
