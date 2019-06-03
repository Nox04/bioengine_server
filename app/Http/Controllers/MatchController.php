<?php

namespace App\Http\Controllers;

use App\Http\Presets\Response;
use App\Http\Presets\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MatchController extends BaseController
{
    public function matchAgainstDatabase(Request $request)
    {
        $response = $this->validateRequest($request->all(), [
            'command' => 'required|max:50',
            'document' => 'required|numeric|digits_between:6,12',
            'template' =>
        ]);
        //enroll 1065641647 cache/p2a.bmp 2
        //match 1065641647 cache/p2a.bmp
        if(isset($response)) return $response;

        return response()->json(
            ['success' => 'rala'],
            Status::SUCCESS,
            $this->getHeaders()
        );
    }
}
