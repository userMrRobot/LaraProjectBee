<?php

namespace App\Http\Controllers\Setings\ConfirmEmail;

use App\Models\User;

class EditController
{
    public function __invoke(User $user)
    {

        return view('auth.verify-email', compact('user'));
    }
}
