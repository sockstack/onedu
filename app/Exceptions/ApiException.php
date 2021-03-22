<?php

namespace App\Exceptions;

use Exception;

class ApiException extends Exception
{
    public $status = 200;
}
