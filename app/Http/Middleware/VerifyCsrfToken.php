<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    protected bool $addHttpCookie = true;

    /**
     * @var array<string>
     */
    protected array $except = [
        // The URIs that should be excluded from CSRF verification.
    ];
}
