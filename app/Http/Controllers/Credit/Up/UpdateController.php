<?php

namespace App\Http\Controllers\Credit\Up;

use App\Http\Controllers\Credit\BaseCreditController;
use App\Http\Requests\Credit\CreditRequest;
use App\Models\User;
use Carbon\Carbon;

class UpdateController extends BaseCreditController
{
    public function __invoke(User $user, CreditRequest $request)
    {
        $money = $user->money;
        $date = $user->date;
        $data = $request->validated();


        $data = $this->service->updateUp($date, $data, $money);

        if ($data === 0) {
            session()->flash('error', 'Невозможно получить кредит повторно.Выплатите предыдущий');
            return redirect()->route('credit.up.edit', $user->id);
        }
        if ($data === 1) {
            session()->flash('error', 'Неверное кол-во серебра');
            return redirect()->route('credit.up.edit', $user->id);
        }



        $money->update([
            'silver' => $data['silver'],
            'credit_up' => $data['credit_up'],
            'credit_down' => $data['credit_down'],
        ]);

        $date->update([
            'credit_start' => $data['date_credit_start'],
            'credit_end' => $data['date_credit_end'],
        ]);

        session()->flash('down', 'Кредит успешно получен');
        return redirect()->route('lk.index');
    }
}
