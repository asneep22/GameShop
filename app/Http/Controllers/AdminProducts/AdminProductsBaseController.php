<?php

namespace App\Http\Controllers\AdminProducts;

use App\Http\Controllers\Controller;
use App\Services\AdminProductsService;

class AdminProductsBaseController extends Controller
{
    public $service;

    public function __construct(AdminProductsService $service)
    {
        $this->service = $service;
    }
}
