<?php

namespace Database\Seeders;

use App\Models\Server;
use Illuminate\Database\Seeder;
use App\Enums\ServerStatus;

class ServerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Server::factory()->create([
            'name' => 'Google Public DNS',
            'ip_address' => '8.8.8.8',
            'port' => '53',
            'status' => ServerStatus::ONLINE,
        ]);

        Server::factory()->create([
            'name' => 'Google Public DNS 2',
            'ip_address' => '4.4.4.4',
            'port' => '53',
            'status' => ServerStatus::OFFLINE,
        ]);
    }
}
