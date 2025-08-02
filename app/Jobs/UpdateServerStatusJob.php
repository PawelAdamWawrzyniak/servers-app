<?php

namespace App\Jobs;

use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Queue\Queueable;
use Illuminate\Support\Facades\Artisan;

class UpdateServerStatusJob implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new job instance.
     */
    public function __construct(private readonly string $ip, private readonly int $port)
    {
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        Artisan::call(command: 'app:server-status-command', parameters: ['ip' => $this->ip, 'port' => $this->port]);
    }
}
