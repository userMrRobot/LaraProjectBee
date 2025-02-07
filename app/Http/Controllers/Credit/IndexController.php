<?php

namespace App\Http\Controllers\Credit;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('credit.index');
    }
}
