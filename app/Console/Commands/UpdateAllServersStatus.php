<?php

namespace App\Console\Commands;

use App\Jobs\UpdateServerStatusJob;
use App\Models\Server;
use Illuminate\Console\Command;
use Symfony\Component\Console\Command\Command as SymfonyCommand;

class UpdateAllServersStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-existing-servers-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Update the status of all existing servers in the database';

    /**
     * Execute the console command.
     */
    public function handle(): int
    {
        Server::all()->each(function (Server $server): void {
            UpdateServerStatusJob::dispatch($server->ip_address, $server->port);
        });

        return SymfonyCommand::SUCCESS;
    }
}
