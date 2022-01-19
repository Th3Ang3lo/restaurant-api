<?php

namespace App\Exceptions;

class ConflictException extends AppError
{
    public function __construct($errorMessage, $statusCode = 409)
    {
        parent::__construct($errorMessage, $statusCode);
    }
}
