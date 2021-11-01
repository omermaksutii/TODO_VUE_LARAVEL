<?php

namespace Api\Tasks\Exceptions;

use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TaskNotFoundException extends NotFoundHttpException
{
    public function __construct()
    {
        parent::__construct('The task was not found.');
    }
}
