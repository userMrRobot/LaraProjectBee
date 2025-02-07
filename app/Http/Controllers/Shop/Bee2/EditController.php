<?php

namespace App\Http\Controllers\Shop\Bee2;

use App\Models\User;

class EditController
{
public function __invoke(User $user)
{
    $money = $user->money;
    $bee = $user->bee;

    $max_bee_2 = floor($money->silver / 5000);
    $bee->update(['max_bee_2' => $max_bee_2]);


    return view('shop.bee2.edit', compact('bee', 'user', 'money'));
}
}
