<?php

namespace App\Http\Controllers;


class HomeController extends BaseController
{
    public function index()
    {
        return response()->json(
            ['status' => 'failed'],
            $this->getResponseStatus('forbidden'),
            $this->getHeaders()
        );
    }
}
