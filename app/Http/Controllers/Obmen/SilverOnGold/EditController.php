<?php

namespace App\Http\Controllers\Obmen\SilverOnGold;

use App\Http\Controllers\Controller;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(User $user)
    {
        $money = $user->money;

        $gold_max = (int)floor($money->silver / 1000);
        $money->update(['gold_max' => $gold_max]);

        return view('obmen.silverOnGold.edit', compact('user', 'money'));
    }
}
