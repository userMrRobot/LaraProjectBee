<?php

namespace App\Http\Controllers\Obmen;

use App\Http\Controllers\Controller;
use App\Service\Obmen\ObmenService;

class BaseObmenController extends Controller
{

    public $service;

    public function __construct(ObmenService $service)
    {
        $this->service = $service;
    }
}
