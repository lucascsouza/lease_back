<?php

namespace App\Services;

use App\Models\Api;
use App\Repositories\ApiRepository;

class ApiService
{

    public function __construct(protected ApiRepository $repository)
    {
    }

    /**
     * @param array $data
     *
     * @return Api
     */
    public function store(array $data): Api
    {
        return $this->repository->store($data);
    }

}