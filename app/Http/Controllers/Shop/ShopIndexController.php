<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ShopIndexController extends Controller
{
    public function __invoke()
    {
        $user = User::query()->findOrFail(Auth::user()->id);
        $money = $user->money;
        $bee = $user->bee;

        return view('Shop.index', compact('money', 'bee'));
    }
}
