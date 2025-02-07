<?php

namespace App\Http\Controllers\Credit\Up;

use App\Http\Controllers\Controller;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(User $user)
    {
        $money = $user->money;
        $date = $user->date;

        return view('credit.Up.edit', compact('money', 'date'));
    }
}
