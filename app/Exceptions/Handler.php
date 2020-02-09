<?php

declare(strict_types=1);

namespace App\Exceptions;

use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Throwable;

class Handler extends ExceptionHandler
{
    /**
     * @var array<string> $dontReport
     */
    protected array $dontReport = [
        // A list of the exception types that are not reported.
    ];

    /**
     * @var array<string> $dontFlash
     */
    protected array $dontFlash = [
        'password',
        'password_confirmation',
    ];

    public function report(Throwable $throwable): void
    {
        parent::report($throwable);
    }

    public function render(Request $request, Throwable $throwable): Response
    {
        return parent::render($request, $throwable);
    }
}
