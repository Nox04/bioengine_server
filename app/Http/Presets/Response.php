<?php

namespace App\Http\Presets;

class Response
{
    public const UNAUTHORIZED = [
        'errors' => [
            ['message' => 'You are not authorized to access this resource.']
        ]
    ];
}
