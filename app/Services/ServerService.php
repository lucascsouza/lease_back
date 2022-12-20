<?php

namespace App\Services;

use App\Models\Server;
use App\Repositories\ServerRepository;
use Illuminate\Support\Collection;

class ServerService
{
    public function __construct(protected ServerRepository $repository)
    {
    }

    public function store(array $data): Server
    {
        return $this->repository->store($data);
    }

    public function getAll(array $filters): Collection
    {
        return $this->repository->getAll($filters);
    }

}