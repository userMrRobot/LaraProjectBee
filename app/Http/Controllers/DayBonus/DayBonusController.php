<?php

namespace App\Http\Controllers\DayBonus;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DayBonusController extends Controller
{
    public function edit(User $user)
    {
        $date = $user->date;
        $money = $user->money;

        $dateNow = Carbon::now()->timestamp;
        $lastBonus = $money->bonus;
        $bonusDate = floor(((int) $dateNow - (int) $date->bonus_date) / 3600) ;

        return view('DayBonus.edit', compact('user', 'bonusDate', 'lastBonus'));
    }

    public function update(User $user)
    {
        $date = $user->date;
        $money = $user->money;

        if((int) $date->bonus_date === 0){
            $dateNow = Carbon::now()->timestamp;
            $date->update([
                'bonus_date' => $dateNow
            ]);
            $bonus = random_int(1000, 10000);

            $money->update([
                'silver' => $money->silver + $bonus,
                'bonus' => $bonus
            ]);
            session()->flash('down', 'Бонус успешно получен');
            return redirect()->route('lk.index');
        }

        $dateNow = Carbon::now()->timestamp;
        if( floor(((int) $dateNow - (int) $date->bonus_date) / 86400) < 1){
            session()->flash('error', "Бонус еще нельзя получить");
            return redirect()->route('daybonus.edit', \Illuminate\Support\Facades\Auth::user()->id);
        }

        $date->update([
            'bonus_date' => $dateNow
        ]);
        $bonus = random_int(1000, 10000);

        $money->update([
            'silver' => $money->silver + $bonus,
            'bonus' => $bonus
        ]);
        session()->flash('down', 'Бонус успешно получен');
        return redirect()->route('lk.index');



    }
}
