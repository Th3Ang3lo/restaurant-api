<?php

namespace App\Exceptions;

use Throwable;

class AppError extends \Exception
{
    public $statusCode;
    public $errorMessage;

    public function __construct($errorMessage, $statusCode)
    {
        $this->statusCode = $statusCode;
        $this->errorMessage = $errorMessage;
    }
}
