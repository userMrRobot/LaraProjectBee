<?php

namespace App\Http\Controllers\Obmen;

use App\Http\Controllers\Controller;
use App\Http\Requests\Obmen\SilverOnGold\ObmenGoldOnRubRequest;
use App\Models\User;

class ObmenGoldOnRubController extends Controller
{
    public function edit(User $user)
    {
        $money = $user->money;

        $rub_max = (int)floor($money->gold / 100);
        $money->update(['rub_max' => $rub_max]);

        return view('obmen.editGoldOnRub', compact('money', 'rub_max'));
    }

    public function update(User $user, ObmenGoldOnRubRequest $request)
    {
        $money = $user->money;
        $request->validated();

        // код для отдельной ф-и 1го класса
        if (((int)$request->moneyObmen > $money->rub_max) or ((int)$request->moneyObmen < 0)) {
            session()->flash('error', 'Неверное кол-во рублей');
            return redirect()->route('obmen.goldonrub.edit', \Illuminate\Support\Facades\Auth::user()->id);
        }

        // код для отдельной ф-и 1го класса
        $gold = $money->gold - ((int)$request->moneyObmen * 100);
        $rub_down = $money->rub_down + (int)$request->moneyObmen;
//        dd($gold, $silver);

        $money->update([
            'gold' => $gold,
            'rub_down' => $rub_down,
        ]);
        session()->flash('down', 'Валюта успешно приобретена');
        return redirect()->route('lk.index');
//        public function obmenSilver(int $moneyObmen)
//    {
//        $this->silverAll = $this->silver - ($moneyObmen * 1000);
//        $this->silver -= ($moneyObmen * 1000);
//        return $this;
//
//    }

//        public function obmenGold(int $moneyObmen)
//    {
//        $this->goldAll = $this->gold + $moneyObmen;
//        $this->gold += $moneyObmen;
//        return $this;

//    }

//        return 1111;
    }
}
