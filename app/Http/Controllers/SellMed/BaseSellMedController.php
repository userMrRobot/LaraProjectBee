<?php

namespace App\Http\Controllers\SellMed;

use App\Http\Controllers\Controller;
use App\Service\SellMed\SellMedService;

class BaseSellMedController extends Controller
{
public $service;

public function __construct(SellMedService $service)
{
    $this->service = $service;
}
}
