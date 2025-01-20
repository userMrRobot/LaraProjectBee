<?php

namespace App\Http\Controllers\Lk;

use App\Http\Controllers\Controller;
use App\Models\Bee;
use App\Models\Money;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LkIndexController extends Controller
{
    public function __invoke()
    {


//$user = Auth::user();
        $user_1 = User::query()->findOrFail(Auth::user()->id);

        $bee = $user_1->bee;
        $money = $user_1->money;
        $date = $user_1->date;

//Главная ф-я логики игры для отедльного класса
        if (!empty($bee->bee_1) or !empty($bee->bee_2) or !empty($bee->bee_3)) {
            if ((int)$bee->time_last === 0) {
                $timeLast = time();
                $bee->update([
                    'time_last' => $timeLast,
                ]);
            }

            $now = time();
            $min_in_sec = 60;
            $bee = $user_1->bee;

            if ($now - (int)$bee->time_last >= $min_in_sec) {

                $count = floor(($now - (int)$bee->time_last) / $min_in_sec);

                $incr = (int)$bee->med * $count;
                $medAll = (int)$bee->med_all + $incr;

                $bee->update([
                    'med_all' => $medAll,
                    'time_last' => $now,
                ]);


            }
        }

//Главная ф-я логики кредита для отедльного класса
        if ($date->credit_start !== null) {
            $curent_data = Carbon::now();
            $credit_end = Carbon::parse($date->credit_end);

            if ($curent_data->isBefore($credit_end)) {
                $date->update([
                    'credit_start' => $curent_data->toDateTimeString(),
                ]);
            }
            else {
                session()->flash('error', 'Погасите кредит');
                return redirect()->route('credit.down.edit', \Illuminate\Support\Facades\Auth::user()->id);
            }


        }
        $credit_start = Carbon::parse($date->credit_start);
        $credit_end = Carbon::parse($date->credit_end);
        $diff = ($credit_start->diff($credit_end))->format('%d дней, %h часов, %i минут');

        return view('Lk.index', compact('bee', 'money', 'date', 'diff'));
    }
}
