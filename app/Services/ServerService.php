<?php

namespace App\Services;

use App\Models\Server;
use App\Repositories\ServerRepository;
use Illuminate\Support\Collection;

class ServerService
{
    /**
     * @param ServerRepository $repository
     */
    public function __construct(protected ServerRepository $repository)
    {
    }

    /**
     * @param array $data
     *
     * @return Server
     */
    public function store(array $data): Server
    {
        return $this->repository->store($data);
    }

    /**
     * @param array $filters
     *
     * @return Collection
     */
    public function getAll(array $filters = []): Collection
    {
        return $this->repository->getAll($filters);
    }

}