<?php

namespace App\Http\Controllers\Ambar;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AmbarIndexController extends Controller
{
    public function __invoke()
    {
       return view('Ambar.index');
    }
}
