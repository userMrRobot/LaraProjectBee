<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Requests\Shop\ShopBeeRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopBee1Controller extends Controller
{
    public function edit(User $user)
    {
        $money = $user->money;
        $bee = $user->bee;

        $max_bee_1 = floor($money->silver / 500);
        $bee->update(['max_bee_1' => $max_bee_1]);


        return view('Shop.editBee1', compact('bee', 'max_bee_1', 'money'));
    }

    public function update(User $user, ShopBeeRequest $request)
    {
        $request->validated();
        $money = $user->money;
        $bee = $user->bee;

        if (((int)$request->countBee > $bee->max_bee_1) or ((int)$request->countBee < 0)) {
            session()->flash('error', 'Неверное кол-во пчел на покупку');
            return redirect()->route('shop.bee1.edit', \Illuminate\Support\Facades\Auth::user()->id);
        }

        $silver = $money->silver - ((int)$request->countBee * 500);
        $bee1 = $bee->bee_1 + (int)$request->countBee;
        $med = $bee->med + ((int)$request->countBee * 1);
//        dd($gold, $silver);

        $money->update([
            'silver' => $silver,

        ]);

        $bee->update([
            'bee_1' => $bee1,
            'med' => $med,
        ]);


        session()->flash('down', 'Пчелы успешно приобретены');
        return redirect()->route('lk.index');
    }
}
