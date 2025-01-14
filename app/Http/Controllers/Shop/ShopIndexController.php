<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShopIndexController extends Controller
{
    public function __invoke()
    {
        return view('Shop.index');
    }
}
