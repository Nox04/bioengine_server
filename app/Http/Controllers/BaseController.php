<?php

namespace App\Http\Controllers;

use App\Http\Presets\Status;
use Illuminate\Support\Facades\Validator;
use Laravel\Lumen\Routing\Controller;

class BaseController extends Controller
{
    protected function validateRequest($data, $rules)
    {
        $validator = Validator::make($data, $rules);

        if ($validator->fails()) {
            return response()->json(
                ['errors' =>$validator->errors()],
                Status::UNPROCESSABLE_ENTITY,
                $this->getHeaders()
            );
        }
        return null;
    }
}
