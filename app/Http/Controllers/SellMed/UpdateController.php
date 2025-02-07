<?php

namespace App\Http\Controllers\SellMed;

use App\Http\Controllers\Controller;
use App\Http\Requests\SellMed\SellMedRequest;
use App\Models\User;
use Illuminate\Http\Request;

class UpdateController extends BaseSellMedController
{
    public function __invoke(User $user, SellMedRequest $request)
    {
        $money = $user->money;
        $bee = $user->bee;
        $data = $request->validated();
        $data = $this->service->update($data, $money, $bee);
        if(!$data){
            session()->flash('error', 'Неверное кол-во меда');
            return redirect()->route('sellMed.edit', $user->id);
        }


//        dd($gold, $silver);

        $money->update([
            'silver' => $data['silver'],

        ]);
        $bee->update([
            'med_all' => $data['med'],
        ]);
        session()->flash('down', 'Мед успешно продан');
        return redirect()->route('lk.index');
    }
}
