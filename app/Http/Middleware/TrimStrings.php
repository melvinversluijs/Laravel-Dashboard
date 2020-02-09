<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\TrimStrings as Middleware;

class TrimStrings extends Middleware
{
    /**
     * @var array<string> $except
     */
    protected array $except = [
        'password',
        'password_confirmation',
    ];
}
