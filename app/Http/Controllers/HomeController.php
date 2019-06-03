<?php

namespace App\Http\Controllers;

use App\Http\Presets\Headers;
use App\Http\Presets\Response;
use App\Http\Presets\Status;

class HomeController extends BaseController
{
    public function index()
    {
        return response()->json(
            Response::UNAUTHORIZED,
            Status::FORBIDDEN,
            Headers::UTF8
        );
    }
}
