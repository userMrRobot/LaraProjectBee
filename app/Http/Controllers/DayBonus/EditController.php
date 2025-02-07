<?php

namespace App\Http\Controllers\DayBonus;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;

class EditController extends Controller
{
public function __invoke(User $user)
{
    $date = $user->date;
    $money = $user->money;

    $dateNow = Carbon::now()->timestamp;
    $lastBonus = $money->bonus;
    $bonusDate = floor(((int) $dateNow - (int) $date->bonus_date) / 3600) > 24 ? 24 : floor(((int) $dateNow - (int) $date->bonus_date) / 3600);

    return view('dayBonus.edit', compact('user', 'bonusDate', 'lastBonus'));
}
}
