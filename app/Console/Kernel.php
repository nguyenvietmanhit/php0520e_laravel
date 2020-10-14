<?php

namespace App\Console;

use App\Mail\DemoMail;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Mail\Message;
use Illuminate\Support\Facades\Mail;

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
//        echo "<pre> >>> " . __FILE__ . "(" . __LINE__ . ")<br/>";
//        print_r($schedule);
//        echo "</pre>";
//        die;
        // $schedule->command('inspire')
        //          ->hourly();
//        $schedule->call(function () {
//            Mail::to('nguyenvietmanhit@gmail.com')->send(new DemoMail());
//        })->everyMinute()->sendOutputTo('abc.txt');
        $schedule->call(function () {
            Mail::raw('nvmanh test', function (Message $message) {
                $message->from('abc@d.e', 'Laravel');
                $message->to('nguyenvietmanhit@gmail.com');
            });
        })->everyMinute();
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
