<?php

namespace Codeage\Multithreading\Exceptions;

use JetBrains\PhpStorm\Internal\LanguageLevelTypeAware;

class ThreadExistException extends \Exception
{

    public function __construct(string $message = "", int $code = 0, ?Throwable $previous = null)
    {
        $message = sprintf("Thread with pid %s already exists", $message);
        parent::__construct($message, $code, $previous);
    }

}