<?php

namespace App\Http\Controllers\DayBonus;

use App\Http\Controllers\Controller;
use App\Service\DayBonus\DayBonusService;

class BaseDayBonusController extends Controller
{
public $service;

public function __construct(DayBonusService $service)
{
    $this->service = $service;
}
}
