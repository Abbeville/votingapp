<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = app('Faker\Factory')->create();

        /*$student = \App\Models\User::create([
            'firstname' => $faker->firstName,
            'lastname' => $faker->lastName,
            'phone_number' => $faker->phoneNumber,
            'avatar_url' => $faker->imageUrl(),
            'payment_status' => false,
            'gender' => 'female',
            'matric' => rand(),
            'level_id' => 1,
            'department_id' => 1,
            'email' => 'student@nassafunaab.com',
            'email_verified_at' => now(),
            'password' => \Illuminate\Support\Facades\Hash::make('student'), // password
        ]);
        $student->assignRole('student');
*/
        $admin = \App\Models\User::create([
            'firstname' => $faker->firstName,
            'lastname' => $faker->lastName,
            'phone_number' => $faker->phoneNumber,
            'avatar_url' => $faker->imageUrl(),
            'payment_status' => false,
            'gender' => 'female',
            'matric' => 'admin',
            'level_id' => 4,
            'department_id' => 1,
            'email' => 'admin@nassafunaab.com',
            'email_verified_at' => now(),
            'password' => \Illuminate\Support\Facades\Hash::make('adminpass'), // password
        ]);
        $admin->assignRole('admin');
    }
}
