<?php

namespace App\Http\Controllers\Credit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Credit\CreditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CreditDownController extends Controller
{
    public function edit(User $user)
    {
        $money = $user->money;
        $date = $user->date;
        return view('Credit.editDown', compact('money', 'date'));
    }

    public function update(User $user, CreditRequest $request)
    {
        $money = $user->money;
        $date = $user->date;

        $request->validated();

        if ((int)$request->moneyObmen !== (int) $money->credit_down) {
            session()->flash('error', "Введите всю сумму $money->credit_down");
            return redirect()->route('credit.down.edit', \Illuminate\Support\Facades\Auth::user()->id);
        }

        if ((int)$request->moneyObmen > (int) $money->silver) {
            session()->flash('error', "Недостаточно серебра на счету Нужно $money->credit_down");
            return redirect()->route('credit.down.edit', \Illuminate\Support\Facades\Auth::user()->id);
        }


//        dd($gold, $silver);
        $silver = $money->silver - (int)$request->moneyObmen;
        $money->update([
            'silver' => $silver,
            'credit_up' => 0,
            'credit_down' => 0,
        ]);

        $date->update([
            'credit_start' => null,
            'credit_end' => null,
        ]);
        session()->flash('down', 'Кредит успешно оплачен');
        return redirect()->route('lk.index');
    }
}
