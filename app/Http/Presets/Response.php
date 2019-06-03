<?php

namespace App\Http\Presets;

class Response
{
    public const UNAUTHORIZED = [
        'errors' => [
            ['message' => 'You are not authorized to access this resource.'],
        ],
    ];

    public const SERVER_ERROR = [
        'errors' => [
            ['message' => 'There was an error processing your request.'],
        ],
    ];

    public static function externalBinError($output)
    {
        return response()->json(
            ['error' => $output],
            Status::SERVER_ERROR,
            Headers::UTF8
        );
    }

    public static function externalBinSuccess($output)
    {
        return response()->json(
            ['message' => trim(preg_replace('/\s\s+/', ' ', $output))],
            Status::SUCCESS,
            Headers::UTF8
        );
    }


}
