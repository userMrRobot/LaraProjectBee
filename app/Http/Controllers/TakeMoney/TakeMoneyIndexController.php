<?php

namespace App\Http\Controllers\TakeMoney;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TakeMoneyIndexController extends Controller
{
    public function __invoke()
    {
        return view('TakeMoney.index');
    }
}
