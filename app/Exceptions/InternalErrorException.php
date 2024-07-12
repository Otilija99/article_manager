<?php

namespace App\Exceptions;

use Exception;

class InternalErrorException extends Exception {
    protected $message = 'Internal Server Error';
    protected $code = 500;
}
