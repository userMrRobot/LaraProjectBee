<?php

namespace App\Http\Controllers\Lk;

use App\Http\Controllers\Controller;
use App\Service\Lk\GameLogService;

class BaseLkGameController extends Controller
{
public $service;
public function __construct(GameLogService $service){
    $this->service = $service;
}

}
