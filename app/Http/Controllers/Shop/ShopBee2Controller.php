<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\ShopBeeRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopBee2Controller extends Controller
{
    public function edit(User $user)
    {
        $money = $user->money;
        $bee = $user->bee;

        $max_bee_2 = floor($money->silver / 5000);
        $bee->update(['max_bee_2' => $max_bee_2]);


        return view('Shop.editBee2', compact('bee', 'max_bee_2', 'money'));
    }

    public function update(User $user, ShopBeeRequest $request)
    {
        $request->validated();
        $money = $user->money;
        $bee = $user->bee;

        if (((int)$request->countBee > $bee->max_bee_2) or ((int)$request->countBee < 0)) {
            session()->flash('error', 'Неверное кол-во пчел на покупку');
            return redirect()->route('shop.bee2.edit', \Illuminate\Support\Facades\Auth::user()->id);
        }

        $silver = $money->silver - ((int)$request->countBee * 5000);
        $bee2 = $bee->bee_2 + (int)$request->countBee;
        $med = $bee->med + ((int)$request->countBee * 10);
//        dd($gold, $silver);

        $money->update([
            'silver' => $silver,

        ]);

        $bee->update([
            'bee_2' => $bee2,
            'med' => $med,
        ]);


        session()->flash('down', 'Пчелы успешно приобретены');
        return redirect()->route('lk.index');
    }
}
