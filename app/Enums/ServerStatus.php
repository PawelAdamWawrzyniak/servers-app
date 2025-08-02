<?php

namespace App\Enums;

use Filament\Support\Contracts\HasColor;
use Filament\Support\Contracts\HasIcon;

enum ServerStatus: string implements HasColor, HasIcon
{
    case ONLINE = 'online';
    case OFFLINE = 'offline';

    public function getIcon(): string
    {
        return match ($this) {
            self::ONLINE => 'heroicon-o-check-circle',
            self::OFFLINE => 'heroicon-o-x-circle',
        };
    }

    public function getColor(): string|array|null
    {
        return match ($this) {
            self::ONLINE => 'success',
            self::OFFLINE => 'danger',
        };
    }
}
