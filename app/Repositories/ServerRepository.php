<?php

namespace App\Repositories;

use App\Models\Server;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Log;

class ServerRepository
{
    
    private const ALLOWED_FILTERS = [
        'ram' => 'array',
        'storage' => 'string',
        'disk_type' => 'string',
        'location' => 'string'
    ];
    
    public function __construct(protected Server $model)
    {
    }

    /**
     * @param array $data
     *
     * @return Server
     */
    public function store(array $data): Server
    {
        $server = $this->model->newInstance();
        $server->fill($data);
        $server->save();
        return $server;
    }

    public function getAll(array $filters = []): Collection
    {
        $filters = array_filter($filters);
        Log::info(implode(',', $filters));
        $query = $this->model->newQuery();
        foreach ($filters as $key => $filter) {
            if (in_array($key, array_keys(self::ALLOWED_FILTERS)) && $filter != 'null') {
                if (self::ALLOWED_FILTERS[$key] == 'array') {
                    $query->whereIn($key, explode(',', $filter));
                    continue;
                }
                $query->where($key, $filter);
            }
        }
        return $query->get();
    }

}