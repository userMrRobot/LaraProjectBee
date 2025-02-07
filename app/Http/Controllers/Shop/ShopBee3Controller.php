<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\ShopBeeRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopBee3Controller extends Controller
{
    public function edit(User $user)
    {
        $money = $user->money;
        $bee = $user->bee;

        $max_bee_3 = floor($money->gold / 50);
        $bee->update(['max_bee_3' => $max_bee_3]);


        return view('shop.editBee3', compact('bee', 'max_bee_3', 'money'));
    }

    public function update(User $user, ShopBeeRequest $request)
    {
        $request->validated();
        $money = $user->money;
        $bee = $user->bee;

        if (((int)$request->countBee > $bee->max_bee_3) or ((int)$request->countBee < 0)) {
            session()->flash('error', 'Неверное кол-во пчел на покупку');
            return redirect()->route('shop.bee3.edit', \Illuminate\Support\Facades\Auth::user()->id);
        }

        $gold = $money->gold - ((int)$request->countBee * 50);
        $bee3 = $bee->bee_3 + (int)$request->countBee;
        $med = $bee->med + ((int)$request->countBee * 50);
//        dd($gold, $silver);

        $money->update([
            'gold' => $gold,

        ]);

        $bee->update([
            'bee_3' => $bee3,
            'med' => $med,
        ]);


        session()->flash('down', 'Пчелы успешно приобретены');
        return redirect()->route('lk.index');
    }
}
