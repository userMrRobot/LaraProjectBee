<?php

namespace App\Http\Controllers\Obmen\GoldOnRub;

use App\Http\Controllers\Controller;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(User $user)
    {

        $money = $user->money;

        $rub_max = (int)floor($money->gold / 100);
        $money->update(['rub_max' => $rub_max]);

        return view('obmen.goldOnRub.edit', compact('user', 'money'));
    }
}
