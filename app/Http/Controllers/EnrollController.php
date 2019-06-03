<?php

namespace App\Http\Controllers;

use App\Http\Presets\Response;
use App\Http\Presets\Status;

class EnrollController extends BaseController
{
    public function enrollToDatabase()
    {
        return response()->json(
            ['success' => 'rala'],
            Status::SUCCESS,
            $this->getHeaders()
        );
    }
}
