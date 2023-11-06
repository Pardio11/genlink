<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();

        $schedule->command("recargo:mesANT")->everyMinute();
        $schedule->command("recargo:created")->everyMinute();
        $schedule->command("contrato:change")->everyMinute();

        //$schedule->command("recargo:mesANT")->monthly();
        //$schedule->command("recargo:created")->cron('0 0 6 * *');
        //$schedule->command("contrato:change")->cron('0 0 14 * *');

        
        
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
