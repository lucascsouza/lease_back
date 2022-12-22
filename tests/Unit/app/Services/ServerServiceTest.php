<?php

namespace Tests\Unit\app\Services;

use App\Models\Server;
use App\Repositories\ServerRepository;
use App\Services\ServerService;
use Tests\TestCase;

class ServerServiceTest extends TestCase
{
    public function testGetAllServers()
    {
        $servers = Server::factory(5)->make();
        $this->mock(ServerRepository::class)
            ->shouldReceive('getAll')
            ->once()
            ->with([])
            ->andReturn($servers);
        
        $service = app(ServerService::class);
        $service->getAll();
    }

    public function testGetAllServersWithFilters()
    {
        $servers = Server::factory(3)->make();
        
        $filters = [
            'storage' => '240GB',
            'ram' => 32,
            'disk_type' => 'SSD',
            'location' => 'AmsterdamAMS-01'
        ];

        $this->mock(ServerRepository::class)
            ->shouldReceive('getAll')
            ->once()
            ->with($filters)
            ->andReturn($servers);

        $service = app(ServerService::class);
        $service->getAll($filters);
    }
    
}