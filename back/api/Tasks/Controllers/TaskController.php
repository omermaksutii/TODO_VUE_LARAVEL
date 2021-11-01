<?php

namespace Api\Tasks\Controllers;

use Api\Tasks\Services\TaskService;
use Infrastructure\Abstracts\Controller;
use Api\Tasks\Requests\CreateTaskRequest;
use Api\Tasks\Requests\UpdateTaskRequest;

class TaskController extends Controller
{
    private $taskService;

    public function __construct(TaskService $taskService)
    {
        $this->taskService = $taskService;
    }

    public function getAll()
    {
        $resourceOptions = $this->parseResourceOptions();

        $sendData = $this->taskService->getAll($resourceOptions);

        return $this->response($sendData);
    }

    public function getById($taskId)
    {
        $resourceOptions = $this->parseResourceOptions();

        $sendData['task'] = $this->taskService->getById($taskId, $resourceOptions);

        return $this->response($sendData);
    }

    public function create(CreateTaskRequest $request)
    {
        $data = $request->validated();

        $sendData['task'] = $this->taskService->create($data);

        return $this->response($sendData, 201);
    }

    public function update($taskId, UpdateTaskRequest $request)
    {
        $data = $request->validated();

        $sendData['task'] = $this->taskService->update($taskId, $data);

        return $this->response($sendData);
    }

    public function delete($taskId)
    {
        $this->taskService->delete($taskId);

        return $this->response(null, 204);
    }
}
