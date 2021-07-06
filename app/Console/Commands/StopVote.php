<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Setting;

class StopVote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'stop:vote';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command stops vote';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Check if vote status has not ended i.e status ==  (ongoing)
        if ($setting['vote'] == 'ongoing') {
            $setting = Setting::where('key', 'vote')->first();

            $setting->value = 'ended';

            $setting->save();
        }
        //if true change vote status to 'ended'
        return 0;
    }
}
