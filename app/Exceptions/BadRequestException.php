<?php

namespace App\Exceptions;

class BadRequestException extends AppError
{
    public array $params;

    public function __construct($errorMessage, $params, $statusCode = 400)
    {
        parent::__construct($errorMessage, $statusCode);
        $this->params = $params;
    }
}
