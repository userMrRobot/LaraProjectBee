<?php

namespace App\Http\Controllers\Shop\Bee1;

use App\Http\Controllers\Controller;
use App\Models\User;

class EditController extends Controller
{
public function __invoke(User $user)
{
    $money = $user->money;
    $bee = $user->bee;

    $max_bee_1 = floor($money->silver / 500);
    $bee->update(['max_bee_1' => $max_bee_1]);


    return view('shop.bee1.edit', compact('bee', 'money', 'user'));
}


}
