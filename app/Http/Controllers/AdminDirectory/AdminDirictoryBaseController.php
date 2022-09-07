<?php

namespace App\Http\Controllers\AdminDirectory;

use App\Http\Controllers\Controller;
use App\Services\AdminDirictoriesService;

class AdminDirictoryBaseController extends Controller
{
    public $service;

    public function __construct(AdminDirictoriesService $service)
    {
        $this->service = $service;
    }
}
