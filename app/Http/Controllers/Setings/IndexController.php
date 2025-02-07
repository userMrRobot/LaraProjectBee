<?php

namespace App\Http\Controllers\Setings;

use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('setings.index');
    }
}
