<?php

declare(strict_types=1);

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\CheckForMaintenanceMode as Middleware;

class CheckForMaintenanceMode extends Middleware
{
    /**
     * @var array<string> $except
     */
    protected $except = [
        // The URIs that should be reachable while maintenance mode is enabled.
    ];
}
