<?php


namespace App\Http\Controllers\Admin\Articles;


use App\Http\Controllers\Controller;
use App\Services\Article\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
