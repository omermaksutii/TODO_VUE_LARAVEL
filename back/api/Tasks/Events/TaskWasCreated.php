<?php

namespace Api\Tasks\Events;

use Api\Tasks\Models\Tasks;
use Infrastructure\Abstracts\Event;

class TaskWasCreated extends Event
{
    public $task;

    public function __construct(Tasks $task)
    {
        $this->task = $task;
    }
}
