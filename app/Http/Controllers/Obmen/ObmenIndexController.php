<?php

namespace App\Http\Controllers\Obmen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ObmenIndexController extends Controller
{
    public function __invoke()
    {
        return view('Obmen.index');
    }
}
