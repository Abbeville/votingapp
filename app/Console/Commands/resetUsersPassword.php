<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\User;

class resetUsersPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reset:passwords';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This command resets all students password to their matric no.';

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
        $users = User::role('student')->get();

        foreach ($users as $user) {

            $matric = $user->matric;

            $newPassword = \Illuminate\Support\Facades\Hash::make($matric);

            $user->password = $newPassword;
            $user->save();
        }

        echo 'Password Reset Succesfully';
    }
}
