<?php

namespace App\Http\Controllers\Lk;

use App\Http\Controllers\Controller;
use App\Models\Bee;
use App\Models\Money;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class IndexGameController extends BaseLkGameController
{
    public function __invoke()
    {
        $user_1 = Auth::user();
        $bee = $user_1->bee;
        $money = $user_1->money;
        $date = $user_1->date;

//Главная ф-я логики игры для отедльного класса
        $this->service->updateBeeProgress($bee);
//

//Главная ф-я логики кредита для отедльного класса

        $response = $this->service->checkAndUpdateCreditStart($date);
        if ($response) {
            return $response; // Перенаправит, если кредит просрочен
        }

        $credit_start = Carbon::parse($date->credit_start);
        $credit_end = Carbon::parse($date->credit_end);
        $diff = ($credit_start->diff($credit_end))->format('%d дней, %h часов, %i минут');

        return view('Lk.index', compact('bee', 'money', 'date', 'diff'));
    }
}
