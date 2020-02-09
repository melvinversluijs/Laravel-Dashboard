<?php

declare(strict_types=1);

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

use function base_path;

class Kernel extends ConsoleKernel
{
    /**
     * @var array<int, string> $commands
     */
    protected array $commands = [];

    // phpcs:disable SlevomatCodingStandard.Functions.UnusedParameter
    protected function schedule(Schedule $schedule): void
    {
        // Put schedules items here.
    }
    // phpcs:enable SlevomatCodingStandard.Functions.UnusedParameter

    protected function commands(): void
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
