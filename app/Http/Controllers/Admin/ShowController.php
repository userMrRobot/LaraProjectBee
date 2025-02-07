<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

class ShowController
{
public function __invoke(User $user)
{
    $moneys = $user->money;
    $bees = $user->bee;
    return view('admin.show', compact('moneys', 'bees', 'user'));
}

}
