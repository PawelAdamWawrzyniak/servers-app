<?php

namespace App\Models;

use App\Enums\ServerStatus;
use Database\Factories\ServerFactory;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * @property string $id
 * @property string $name
 * @property string $ip_address
 * @property string $port
 * @property ServerStatus|null $status
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static ServerFactory factory($count = null, $state = [])
 * @method static Builder<static>|Server newModelQuery()
 * @method static Builder<static>|Server newQuery()
 * @method static Builder<static>|Server query()
 * @method static Builder<static>|Server whereCreatedAt($value)
 * @method static Builder<static>|Server whereId($value)
 * @method static Builder<static>|Server whereIpAddress($value)
 * @method static Builder<static>|Server whereName($value)
 * @method static Builder<static>|Server wherePort($value)
 * @method static Builder<static>|Server whereStatus($value)
 * @method static Builder<static>|Server whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Server extends Model
{
    /** @use HasFactory<ServerFactory> */
    use HasFactory;
    use HasUlids;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'ip_address',
        'port',
        'status',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'status' => ServerStatus::class,
        ];
    }
}
