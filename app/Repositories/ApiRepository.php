<?php

namespace App\Repositories;

use App\Models\Api;

class ApiRepository
{

    public function __construct(protected Api $model)
    {
    }

    /**
     * @param array $data
     *
     * @return Api
     */
    public function store(array $data): Api
    {
        $api = $this->model->newInstance();
        $api->fill($data);
        $api->save();
        return $api;
    }

}