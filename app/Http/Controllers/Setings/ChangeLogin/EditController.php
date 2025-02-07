<?php

namespace App\Http\Controllers\Setings\ChangeLogin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class EditController extends Controller
{
public function __invoke(User $user)
{

    return view('setings.changeLogin.edit', compact('user'));
}

}
