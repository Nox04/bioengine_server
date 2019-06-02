<?php

namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller;


class BaseController extends Controller
{
    /**
     * Generate the json headers
     *
     */
    protected function getHeaders()
    {
        return [
            'Content-Type' => 'application/json; charset=UTF-8',
            'charset' => 'utf-8'
        ];
    }
}
