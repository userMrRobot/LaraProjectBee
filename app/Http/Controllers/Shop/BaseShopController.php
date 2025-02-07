<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Service\Shop\ShopService;

class BaseShopController extends Controller
{
    public $service;

    public function __construct(ShopService $service)
    {
        $this->service = $service;
    }
}
