<?php

namespace Api\Tasks\Repositories;

use Api\Tasks\Models\Tasks;
use Infrastructure\Abstracts\Repository;

class TaskRepository extends Repository
{
    public function getModel()
    {
        return new Tasks();
    }

    public function create(array $data)
    {
        $task = $this->getModel();

        $task->fill($data);
        $task->save();

        return $task;
    }

    public function update(Tasks $task, array $data)
    {
        $task->fill($data);

        $task->save();

        return $task;
    }
}
