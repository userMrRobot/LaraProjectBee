<?php

namespace App\Http\Controllers\DayBonus;

use App\Http\Controllers\Controller;
use App\Models\User;
use Carbon\Carbon;

class UpdateController extends BaseDayBonusController
{
public function __invoke(User $user)
{
    $date = $user->date;
    $money = $user->money;

    if ($this->service->canClaimBonus($date)) {
        $this->service->updateBonus($date, $money);
        session()->flash('down', 'Бонус успешно получен');
        return redirect()->route('lk.index');
    }

    session()->flash('error', 'Бонус еще нельзя получить');
    return redirect()->route('dayBonus.edit', $user->id);

}
}
