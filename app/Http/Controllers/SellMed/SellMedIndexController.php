<?php

namespace App\Http\Controllers\SellMed;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SellMedIndexController extends Controller
{
    public function __invoke()
    {
       return view('SellMed.index');
    }
}
