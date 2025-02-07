<?php

namespace App\Http\Controllers\Shop\Bee3;

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
    $data = $this->service->UpdateBee3($data, $bee, $money);

    if (!$data) {
        session()->flash('error', 'Неверное кол-во пчел на покупку');
        return redirect()->route('shop.bee3.edit', $user->id);

    }

    $money->update([
        'gold' => $data['gold'],
    ]);

    $bee->update([
        'bee_3' => $data['bee3'],
        'med' => $data['med'],
    ]);


    session()->flash('down', 'Пчелы успешно приобретены');
    return redirect()->route('lk.index');
}
}
