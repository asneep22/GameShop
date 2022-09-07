<?php

namespace App\Http\Controllers\AdminAdmins;

use App\Http\Controllers\Controller;
use App\Services\AdminAdminsService;

class AdminAdminsBaseController extends Controller
{
    public $service;

    public function __construct(AdminAdminsService $service)
    {
        $this->service = $service;
    }
}
