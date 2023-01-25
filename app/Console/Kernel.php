<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {

        // $schedule->command('meetups:bulk all')->weekdays()->dailyAt('10:00');

        // $schedule->command('meetups:bulk all')->weekdays()->dailyAt('14:30');

        // $schedule->command('meetups:bulk all')->weekdays()->dailyAt('19:00');


        $schedule->command('meetups:bulk all')->tuesdays()->dailyAt('12:00');

        $schedule->command('meetups:bulk all')->thursdays()->dailyAt('12:00');





    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
