<?php

namespace App\Service;

class HealthCheckServer
{
    public function check(string $ip, int $port): bool
    {
        $handle = @fsockopen(hostname: $ip, port: $port, timeout: 5);

        if ($handle === false) {
            return false;
        }

        fclose($handle);
        return true;
    }
}
