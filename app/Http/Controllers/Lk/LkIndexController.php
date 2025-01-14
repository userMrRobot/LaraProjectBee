<?php

namespace App\Http\Controllers\Lk;

use App\Http\Controllers\Controller;

class LkIndexController extends Controller
{
    public function __invoke()
    {
        return view('Lk.index');
    }
}
