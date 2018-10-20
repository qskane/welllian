<?php

namespace App\Exceptions;

use Exception;

class InternalException extends Exception
{
    public function report()
    {
        //
    }

    public function render($request)
    {
        dd('internal exception');

        return;
    }
}
