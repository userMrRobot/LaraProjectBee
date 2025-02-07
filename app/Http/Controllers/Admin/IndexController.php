<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;

class IndexController extends Controller
{
public function __invoke()
{
    $dataUsers = User::all();
    return view('admin.index', compact('dataUsers'));
}
}
