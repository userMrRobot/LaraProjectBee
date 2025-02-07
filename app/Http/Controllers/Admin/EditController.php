<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;

class EditController
{
public function __invoke(User $user)
{
    $moneys = $user->money;
    $bees = $user->bee;
    return view('admin.edit', compact('moneys', 'bees', 'user'));
}

}
