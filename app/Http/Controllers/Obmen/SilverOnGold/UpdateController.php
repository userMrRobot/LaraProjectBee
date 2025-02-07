<?php

namespace App\Http\Controllers\Obmen\SilverOnGold;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Obmen\BaseObmenController;

use App\Http\Requests\Obmen\SilverOnGold\ObmenSilverOnGoldRequest;
use App\Http\Requests\Setings\ChangeEmail\ChangeEmailRequest;
use App\Http\Requests\Setings\ChangeLogin\ChangeLoginRequest;
use App\Models\User;

class UpdateController extends BaseObmenController
{

public function __invoke(User $user, ObmenSilverOnGoldRequest $request)
{
    $money = $user->money;
    $data = $request->validated();
    $data = $this->service->UpdateSilverOnGold($data, $user, $money);
    if(!$data){
        session()->flash('error', 'Неверное кол-во серебра');
        return redirect()->route('obmen.silverOnGold.edit', $user->id);
    }


    $money->update([
        'silver' => $data['silver'],
        'gold' => $data['gold'],
    ]);
    session()->flash('down', 'Валюта успешно приобретена');
    return redirect()->route('lk.index');
}
}
