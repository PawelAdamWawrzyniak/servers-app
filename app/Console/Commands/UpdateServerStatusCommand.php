<?php

namespace App\Console\Commands;

use App\Enums\ServerStatus;
use App\Models\Server;
use App\Service\HealthCheckServer;
use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as SymfonyCommand;

class UpdateServerStatusCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:server-status-command {ip} {port}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the server status in the database';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        $port = $this->argument(key: 'port');
        $ip = $this->argument(key: 'ip');

        $healthCheckServer = new HealthCheckServer();

        $status = $healthCheckServer->check($ip, $port);

        $server = Server::query()->where(column: 'ip_address', operator: '=', value: $ip)
            ->where(column: 'port', operator: '=', value: $port)
            ->first();

        if ($server === null) {
            $this->info(string: 'Server not found.');
            $this->info(string: 'Skipping server\'s status update.');

            return SymfonyCommand::FAILURE;
        }

        $server->update(attributes: [
            'status' => $status ? ServerStatus::ONLINE : ServerStatus::OFFLINE,
        ]);

        $this->info(string: 'Server status updated successfully.');

        return SymfonyCommand::SUCCESS;
    }
}
