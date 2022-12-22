<?php

namespace Tests\Unit\app\Transformers;

use App\Transformers\ServerXLSTransformer;
use Tests\TestCase;

class ServerXLSTransformerTest extends TestCase
{

    /**
     * @dataProvider dataToTransform
     *
     * @return void
     */
    public function testTransform($expected, $data)
    {
        
        $transformer = app(ServerXLSTransformer::class);
        $transformedData = $transformer->transform($data);
        
        $this->assertEquals($expected, $transformedData);
    }
    
    private function dataToTransform(): array
    {
        return [
            '#1 - 2x2TB disks transformed into 4000GB capacity and 4TB as alias' => [
                [
                    "name" => "Dell R210Intel Xeon X3440",
                    "ram" => "16",
                    "ram_specification" => "DDR3",
                    "storage" => 4000,
                    "storage_alias" => "4TB",
                    "storage_description" => "2x2TBSATA2",
                    "disk_type" => "SATA2",
                    "location" => "AmsterdamAMS-01",
                    "price" => 49.99,
                    "currency" => "€",
                ],
                [
                    'model' => 'Dell R210Intel Xeon X3440',
                    'ram' => '16GBDDR3',
                    'hdd' => '2x2TBSATA2',
                    'location' => 'AmsterdamAMS-01',
                    'price' => '€49.99',
                ]
            ],
            '#2 - Composite currency, DDR4 memory, GB metric for disks' => [
                [
                    "name" => "Dell R9304x Intel Xeon E7-4850v3",
                    "ram" => "64",
                    "ram_specification" => "DDR4",
                    "storage" => 240,
                    "storage_alias" => "240GB",
                    "storage_description" => "2x120GBSSD",
                    "disk_type" => "SSD",
                    "location" => "SingaporeSIN-11",
                    "price" => 1787.99,
                    "currency" => "S$",
                ],
                [
                    'model' => 'Dell R9304x Intel Xeon E7-4850v3',
                    'ram' => '64GBDDR4',
                    'hdd' => '2x120GBSSD',
                    'location' => 'SingaporeSIN-11',
                    'price' => 'S$1787.99',
                ]
            ]
        ];
    }
    
}