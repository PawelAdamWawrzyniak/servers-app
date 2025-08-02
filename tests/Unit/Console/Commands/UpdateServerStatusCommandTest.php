<?php

namespace Tests\Console\Commands;

use App\Enums\ServerStatus;
use App\Models\Server;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Symfony\Component\Console\Command\Command;

uses(classAndTraits: RefreshDatabase::class);

it(description: 'update status of server in DB', closure: function (string $ip, int $port, ServerStatus $initialStatus, ServerStatus $expectedStatus): void {

    // GIVEN
    $id = 'b9dcf793-85a1-45e9-9eeb';

    $server = Server::factory()->create([
        'id' => $id,
        'ip_address' => $ip,
        'name' => 'Test Server',
        'port' => $port,
        'status' => $initialStatus,
    ]);

    // WHEN
    $this->artisan(command: 'app:server-status-command', parameters: [
        'ip' => $ip,
        'port' => $port, ])

    // THEN
        ->expectsOutput(output: 'Server status updated successfully.')
        ->assertExitCode(exitCode: Command::SUCCESS);

    $this->assertDatabaseHas(table: 'servers', data: [
        'id' => $server->id,
        'ip_address' => $ip,
        'port' => $port,
        'status' => $expectedStatus->value,
    ]);

})->with(data: [
    'online' => ['mysql', 3_306, ServerStatus::OFFLINE, ServerStatus::ONLINE],
    'offline' => ['127.0.0.1', 45_970, ServerStatus::ONLINE, ServerStatus::OFFLINE],
]);
