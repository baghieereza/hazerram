<?php

namespace App\Console\Commands;

use App\Http\helper;
use App\Models\Sms_logs;
use App\Repository\courseTimeRepository;
use App\Repository\scheduleRepository;
use Illuminate\Console\Command;

class DemoCron extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'demo:cron';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';


    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     * @throws \Exception
     */
    public function handle()
    {
        \Log::info("Cron is working fine!");

//        scheduleRepository::CheckCourse();
//        scheduleRepository::StartCourse();
//        scheduleRepository::RunCourse();
//        scheduleRepository::SendNotification();
//        scheduleRepository::CheckCourseHasNotStarted();


        $this->info('Demo:Cron Cummand Run successfully!');
    }
}

