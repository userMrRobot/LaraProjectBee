<?php

namespace App\Http\Controllers\Setings;

use App\Http\Controllers\Controller;

class SetingsIndexController extends Controller
{
    public function __invoke()
    {
        return view('Setings.index');
    }
}
