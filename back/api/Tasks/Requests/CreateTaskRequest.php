<?php

namespace Api\Tasks\Requests;

use Infrastructure\Abstracts\ApiRequest;

class CreateTaskRequest extends ApiRequest
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
