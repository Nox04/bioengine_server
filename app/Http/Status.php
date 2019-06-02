<?php

namespace App\Http;

/**
 * @method static self SUCCESS()
 * @method static self BAD_REQUEST()
 * @method static self UNAUTHORIZED()
 */
class Status extends Enum
{
    public const SUCCESS = 200;
    public const BAD_REQUEST = 400;
    public const UNAUTHORIZED = 401;
    public const FORBIDDEN = 403;
    public const NOT_FOUND = 404;
    public const UNPROCESSABLE_ENTITY = 422;
}
