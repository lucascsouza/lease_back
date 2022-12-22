<?php

namespace Database\Factories;

use App\Models\Server;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServerFactory extends Factory
{
    protected $model = Server::class;

    /**
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'ram' => fake()->numberBetween(8, 16),
            'ram_specification' => fake()->randomElement(['DDR3', 'DDR4']),
            'storage' => fake()->randomNumber(),
            'storage_alias' => fake()->randomNumber() . 'GB',
            'storage_description' => fake()->text,
            'disk_type' => fake()->randomElement(['SATA2', 'SAS', 'SSD']),
            'location' => fake()->randomElement(['FrankfurtFRA-10', 'Washington D.C.WDC-01', 'AmsterdamAMS-01']),
            'currency' => fake()->randomElement(['€', '$']),
            'price' => fake()->randomFloat(2, 40, 200),
        ];
    }
}
