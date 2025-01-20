<?php

namespace App\Http\Controllers\Credit;

use App\Http\Controllers\Controller;
use App\Http\Requests\Credit\CreditRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Carbon\Carbon;

class CreditController extends Controller
{
    public function edit(User $user)
    {
        $money = $user->money;
        $date = $user->date;
        return view('Credit.edit', compact('money', 'date'));
    }

    public function update(User $user, CreditRequest $request)
    {
        $money = $user->money;
        $date = $user->date;

        $request->validated();
        if($date->credit_start !== null){
            session()->flash('error', 'Невозможно получить кредит повторно.Выплатите предыдущий');
            return redirect()->route('credit.edit', \Illuminate\Support\Facades\Auth::user()->id);
        }
        if (((int)$request->moneyObmen > 100000) or ((int)$request->moneyObmen < 0)) {
            session()->flash('error', 'Неверное кол-во серебра');
            return redirect()->route('credit.edit', \Illuminate\Support\Facades\Auth::user()->id);
        }

        $date_credit_start = Carbon::now()->toDateTimeString();

        $date_credit_end = Carbon::now()->addDays(7)->toDateTimeString();




        $silver = (int) $money->silver + (int)$request->moneyObmen;
        $credit_up = (int)$request->moneyObmen;
        $credit_down = (int) floor((int)$request->moneyObmen * 1.1);

//        dd($gold, $silver);

        $money->update([
            'silver' => $silver,
            'credit_up' => $credit_up,
            'credit_down' => $credit_down,
        ]);

        $date->update([
            'credit_start' => $date_credit_start,
            'credit_end' => $date_credit_end,
        ]);
        session()->flash('down', 'Кредит успешно получен');
        return redirect()->route('lk.index');
    }
}
