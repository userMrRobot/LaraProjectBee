<?php

namespace App\Http\Controllers\Deposit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DepositIndexController extends Controller
{
    public function __invoke()
    {
       return view('Deposit.index');
    }
}
