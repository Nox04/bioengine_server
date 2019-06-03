<?php

namespace App\Http\Presets;

class Response
{
    public const UNAUTHORIZED = [
        'errors' => [
            ['message' => 'You are not authorized to access this resource.']
        ]
    ];

    public const SERVER_ERROR = [
        'errors' => [
            ['message' => 'There was an error processing your request.']
        ]
    ];
}
