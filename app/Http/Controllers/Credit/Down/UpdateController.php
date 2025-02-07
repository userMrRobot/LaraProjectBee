<?php

namespace App\Http\Controllers\Credit\Down;

use App\Http\Controllers\Credit\BaseCreditController;
use App\Http\Requests\Credit\CreditRequest;
use App\Models\User;

class UpdateController extends BaseCreditController
{
    public function __invoke(User $user, CreditRequest $request)
    {
        $money = $user->money;
        $date = $user->date;
        $data = $request->validated();

        $data = $this->service->updateDown($data, $money);
        if ($data === 0) {
            session()->flash('error', "Введите всю сумму $money->credit_down");
            return redirect()->route('credit.down.edit', $user->id);
        }
        if ($data === 1) {
            session()->flash('error', "Недостаточно серебра на счету. Нужно $money->credit_down");
            return redirect()->route('credit.down.edit', $user->id);
        }

        $money->update([
            'silver' => $data['silver'],
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
