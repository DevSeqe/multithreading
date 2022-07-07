<?php

namespace Codeage\Multithreading\Exceptions;

class ThreadDoesntExistException extends \Exception
{

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        $message = sprintf("Thread with pid %s does not exist", $message);
        parent::__construct($message, $code, $previous);
    }

}