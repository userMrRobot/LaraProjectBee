<?php

namespace App\Http\Controllers\Obmen;

use App\Http\Controllers\Controller;
use App\Http\Requests\Obmen\ObmenSilverOnGoldRequest;
use App\Models\User;

class ObmenSilverOnGoldController extends Controller
{
    public function edit(User $user)
    {
        $money = $user->money;

        $gold_max = (int)floor($money->silver / 1000);
        $money->update(['gold_max' => $gold_max]);

        return view('Obmen.editSilverOnGold', compact('money', 'gold_max'));
    }

    public function update(User $user, ObmenSilverOnGoldRequest $request)
    {
        $money = $user->money;
        $request->validated();

        // код для отдельной ф-и 1го класса
        if (((int)$request->moneyObmen > $money->gold_max) or ((int)$request->moneyObmen < 0)) {
            session()->flash('error', 'Неверное кол-во серебра');
            return redirect()->route('obmen.silverongold.edit', \Illuminate\Support\Facades\Auth::user()->id);
        }
        // код для отдельной ф-и 1го класса
        $silver = $money->silver - ((int)$request->moneyObmen * 1000);
        $gold = $money->gold + (int)$request->moneyObmen;
//        dd($gold, $silver);

        $money->update([
            'silver' => $silver,
            'gold' => $gold,
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
