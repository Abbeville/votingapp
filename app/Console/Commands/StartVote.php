<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use Carbon\Carbon;
use App\Models\Setting;

use DB;

class StartVote extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'start:vote';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This Command starts vote';

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
        $setting = DB::table('settings')->get()
                    ->keyBy('key')
                    ->transform(function ($setting) {
                        return $setting->value;
                    })->toArray();

        //Check if vote status has not ended i.e status ==  (upcoming)
        if ($setting['vote'] == 'upcoming') {
            $start = $setting['vote_start_date'];


            //Check if current date and time => starttime.
            if (Carbon::now() >= Carbon::make($start)) {
                $setting = Setting::where('key', 'vote')->first();

                $setting->value = 'ongoing';

                $setting->save();
            }
        }


        //if true change vote status to 'ongoing'
        return 0;
    }
}
