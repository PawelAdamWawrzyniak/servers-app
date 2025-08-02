<?php

namespace Tests\Unit\Service;

use App\Service\HealthCheckServer;

it(description: 'validates the proper server response', closure: function (string $ip, int $port, bool $expected) {

    // GIVEN
    $healthCheckServer = new HealthCheckServer();

    // WHEN
    $result = $healthCheckServer->check(ip: $ip, port: $port);

    // THEN
    expect(value: $result)->toBe(expected: $expected);
})->with([
    'valid server response' => [
        '127.0.0.1',
        80,
        true,
    ],
    'not valid server response' => [
        '127.0.0.1',
        8560,
        false,
    ],
]);
