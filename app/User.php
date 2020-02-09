<?php

declare(strict_types=1);

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * @var array<string> $fillable
     */
    protected array $fillable = [
        'name', 'email', 'avatar', 'provider', 'provider_id', 'password',
    ];

    /**
     * @var array<string> $hidden
     */
    protected array $hidden = [
        'password', 'remember_token',
    ];

    /**
     * @var array<string> $casts
     */
    protected array $casts = [
        'email_verified_at' => 'datetime',
    ];
}
