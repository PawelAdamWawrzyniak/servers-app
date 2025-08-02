<?php

namespace App\Enums;

enum ServerStatus: string
{
    case ONLINE = 'online';
    case OFFLINE = 'offline';
}
