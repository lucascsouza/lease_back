<?php

namespace Tests\Feature\app\Http\Controllers;

use App\Models\Server;
use App\Repositories\ServerRepository;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Support\Collection;
use Tests\TestCase;

class ServerControllerTest extends TestCase
{
    use WithoutMiddleware;
    
    protected function setUp(): void
    {
        parent::setUp();
    }

    public function testIndex()
    {
        $servers = Server::factory(5)->make();
        $expectedResponse = json_encode($servers->toArray());
        
        $this->mock(ServerRepository::class)
            ->shouldReceive('getAll')
            ->once()
            ->with([])
            ->andReturn($servers);
        
        $response = $this->get(route('servers.index'));
        $this->assertEquals($expectedResponse, $response->getContent());
    }

    public function testFilterData()
    {
        $servers = $this->getServerCollectionForFilter();
        $expectedResponse = json_encode([
            'storage' => [
                '120GB' => 120,
                '480GB' => 480,
                '1TB' => 1000,
                '2TB' => 2000,
                '5TB' => 5000,
            ],
            'disk_types' => ['SAS','SATA2','SSD'],
            'ram' => [
                4, 8, 12, 16, 32
            ],
            'locations' => [
                'AmsterdamAMS-01',
                'FrankfurtFRA-10',
                'Washington D.C.WDC-01'
            ],
        ]);

        $this->mock(ServerRepository::class)
            ->shouldReceive('getAll')
            ->once()
            ->with([])
            ->andReturn($servers);

        $response = $this->get(route('servers.filterData'));
        $this->assertEquals($expectedResponse, $response->getContent());
    }

    private function getServerCollectionForFilter(): Collection
    {
        return collect([
            [
                "ram" => 16,
                "storage" => 480,
                'storage_alias' => '480GB',
                "disk_type" => "SATA2",
                "location" => "Washington D.C.WDC-01",
            ],
            [
                "ram" => 32,
                "storage" => 1000,
                'storage_alias' => '1TB',
                "disk_type" => "SAS",
                "location" => "AmsterdamAMS-01",
            ],
            [
                "ram" => 8,
                "storage" => 2000,
                'storage_alias' => '2TB',
                "disk_type" => "SSD",
                "location" => "Washington D.C.WDC-01",
            ],
            [
                "ram" => 12,
                "storage" => 120,
                'storage_alias' => '120GB',
                "disk_type" => "SSD",
                "location" => "FrankfurtFRA-10",
            ],
            [
                "ram" => 4,
                "storage" => 5000,
                'storage_alias' => '5TB',
                "disk_type" => "SATA2",
                "location" => "AmsterdamAMS-01",
            ]
        ]);
    }

}