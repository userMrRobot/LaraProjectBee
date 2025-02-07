<?php

namespace App\Http\Controllers\SellMed;

use App\Http\Controllers\Controller;

use App\Models\User;
use Illuminate\Http\Request;

class EditController extends Controller
{
    public function __invoke(User $user)
    {
        $money = $user->money;
        $bee = $user->bee;
        return view('sellMed.edit', compact( 'money', 'bee', 'user'));
    }
}
