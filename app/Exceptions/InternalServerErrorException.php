<?php

namespace App\Exceptions;

class InternalServerErrorException extends AppError
{
    public function __construct($errorMessage, $statusCode = 400)
    {
        parent::__construct($errorMessage, $statusCode);
    }
}
