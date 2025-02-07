<?php

namespace App\Http\Controllers\Shop\Bee3;

use App\Models\User;

class EditController
{
public function __invoke(User $user)
{
    $money = $user->money;
    $bee = $user->bee;

    $max_bee_3 = floor($money->gold / 50);
    $bee->update(['max_bee_3' => $max_bee_3]);


    return view('shop.bee3.edit', compact('bee', 'user', 'money'));
}
}
