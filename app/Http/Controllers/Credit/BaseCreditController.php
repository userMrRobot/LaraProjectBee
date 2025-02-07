<?php

namespace App\Http\Controllers\Credit;

use App\Http\Controllers\Controller;
use App\Service\Credit\CreditService;

class BaseCreditController extends Controller
{
public $service;
public function __construct(CreditService $service)
{
    $this->service = $service;
}
}
