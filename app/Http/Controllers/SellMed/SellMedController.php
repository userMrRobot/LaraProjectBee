<?php

namespace App\Http\Controllers\SellMed;

use App\Http\Controllers\Controller;
use App\Http\Requests\SellMed\SellMedRequest;
use App\Models\User;
use Illuminate\Http\Request;

class SellMedController extends Controller
{
    public function edit(User $user)
    {
        $money = $user->money;
        $bee = $user->bee;
        return view('SellMed.editSellMed', compact( 'money', 'bee'));
    }

    public function update(User $user, SellMedRequest $request)
    {
        $money = $user->money;
        $bee = $user->bee;
        $request->validated();

        if (((int)$request->medObmen > $bee->med_all) or ((int)$request->medObmen < 0)) {
            session()->flash('error', 'Неверное кол-во меда');
            return redirect()->route('sellmed.edit', \Illuminate\Support\Facades\Auth::user()->id);
        }

        $med = $bee->med_all - ((int)$request->medObmen);
        $silver = $money->silver + ((int) floor((int)$request->medObmen / 100));
//        dd($gold, $silver);

        $money->update([
            'silver' => $silver,

        ]);
        $bee->update([
            'med_all' => $med,
        ]);
        session()->flash('down', 'Мед успешно продан');
        return redirect()->route('lk.index');
    }



}
