<?php

namespace Api\Tasks\Services;

use Illuminate\Events\Dispatcher;
use Api\Tasks\Events\TaskWasCreated;
use Api\Tasks\Events\TaskWasDeleted;
use Api\Tasks\Events\TaskWasUpdated;
use Illuminate\Support\Facades\Gate;
use Api\Tasks\Repositories\TaskRepository;
use Api\Tasks\Exceptions\TaskNotFoundException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class TaskService
{
    private $taskRepository;
    private $dispatcher;

    public function __construct(
        TaskRepository $taskRepository,
        Dispatcher $dispatcher
    ) {
        $this->taskRepository = $taskRepository;
        $this->dispatcher = $dispatcher;
    }

    public function getAll($options = [])
    {
        return $this->taskRepository->getWithCount($options);
    }

    public function getById($userId, array $options = [])
    {
        $user = $this->getRequestedTask($userId, $options);
        
        return $user;
    }

    public function create($data)
    {
        $task = $this->taskRepository->create($data);

        $this->dispatcher->dispatch(new TaskWasCreated($task));

        return $task;
    }

    public function update($taskId, array $data)
    {
        $task = $this->getRequestedTask($taskId);

        $this->taskRepository->update($task, $data);

        $this->dispatcher->dispatch(new TaskWasUpdated($task));
    }

    public function delete($taskId)
    {
        $task = $this->getRequestedTask($taskId, ['select' => ['id']]);

        $this->taskRepository->delete($taskId);

        $this->dispatcher->dispatch(new TaskWasDeleted($task));

        return $task;
    }

    private function getRequestedTask($taskId, array $options = [])
    {
        $task = $this->taskRepository->getById($taskId, $options);

        if (is_null($task)) {
            throw new TaskNotFoundException;
        }

        return $task;
    }
}
