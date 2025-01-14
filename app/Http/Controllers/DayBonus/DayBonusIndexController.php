<?php

namespace App\Http\Controllers\DayBonus;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DayBonusIndexController extends Controller
{
    public function __invoke()
    {
        return view('DayBonus.index');
    }
}
