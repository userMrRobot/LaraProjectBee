<?php

namespace App\Http\Controllers\Obmen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function __invoke()
    {
        return view('obmen.index');
    }
}
