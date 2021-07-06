<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use DB;

class ContestsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $contests = [
        	['title' => 'President', 'category_id' => 1],
        	['title' => 'Gen Sec', 'category_id' => 1],
        	['title' => 'Fin Sec', 'category_id' => 1],
        	['title' => 'Treasurer', 'category_id' => 1]
        ];

        foreach ($contests as $contest) {
            DB::table('contests')->insert($contest);
        }
    }
}
