<?php

namespace App\Http\Controllers\Credit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreditIndexController extends Controller
{
    public function __invoke()
    {
        return view('Credit.index');
    }
}
