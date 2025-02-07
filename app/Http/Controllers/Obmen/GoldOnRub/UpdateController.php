<?php

namespace App\Http\Controllers\Obmen\GoldOnRub;


use App\Http\Controllers\Obmen\BaseObmenController;
use App\Http\Requests\Obmen\GoldOnRub\ObmenGoldOnRubRequest;
use App\Models\User;

class UpdateController extends BaseObmenController
{

public function __invoke(User $user, ObmenGoldOnRubRequest $request)
{
    $money = $user->money;
    $data = $request->validated();
    $data = $this->service->UpdateGoldOnRub($data, $user, $money);
    if(!$data){
        session()->flash('error', 'Неверное кол-во рублей на вывод');
        return redirect()->route('obmen.goldOnRub.edit', $user->id);
    }


    $money->update([
        'rub_down' => $data['rub_down'],
        'gold' => $data['gold'],
    ]);
    session()->flash('down', 'Валюта успешно приобретена');
    return redirect()->route('lk.index');
}
}
