<?php

namespace Api\Tasks\Requests;

use Infrastructure\Abstracts\ApiRequest;

class UpdateTaskRequest extends ApiRequest
{
    public function rules()
    {
        return [
            'title' => 'required|string',
            'description' => 'required|string',
            'status' => 'required',
        ];
    }
}
