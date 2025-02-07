<?php

namespace App\Http\Controllers\Setings;

use App\Http\Controllers\Controller;
use App\Service\Setings\UserService;

class BaseSetingsController extends Controller
{

    public $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
}
