<?php

namespace App\Console;


use App\Console\Commands\FirstCommand;
use App\Console\Commands\MyHwCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected $commands =[
      FirstCommand::class
    ];
    protected $course = [
      MyHwCommand::class
    ];
    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
//        $schedule->command('queue:listen')
        $schedule->command('send:currencies')
            ->days([2, 3, 4, 5, 6])
            ->twiceDaily(9, 13);
        // $schedule->command('inspire')->hourly();
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
