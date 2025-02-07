<?php

namespace App\Http\Controllers\Credit\Down;

use App\Http\Controllers\Controller;
use App\Models\User;

class EditController extends Controller
{
public function __invoke(User $user)
{
    $money = $user->money;
    $date = $user->date;

    return view('credit.Down.edit', compact('money', 'date'));
}
}
