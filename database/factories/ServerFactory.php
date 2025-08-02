<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Server>
 */
class ServerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id' => Str::ulid(),
            'name' => fake()->company(),
            'ip_address' => fake()->ipv4(),
            'port' => fake()->numberBetween(int1: 1_024, int2: 65_535),
            'status' => fake()->randomElement(array: ['online', 'offline']),
        ];
    }
}
