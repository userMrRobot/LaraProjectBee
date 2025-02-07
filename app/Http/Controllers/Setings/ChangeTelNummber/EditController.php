<?php

namespace App\Http\Controllers\Setings\ChangeTelNummber;

use App\Http\Controllers\Controller;
use App\Models\User;

class EditController extends Controller
{
    public function __invoke(User $user)
    {

        return view('setings.changeTellNumber.edit', compact('user'));
    }
}
