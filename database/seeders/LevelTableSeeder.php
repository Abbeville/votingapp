<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LevelTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $levels = array(
         array('name' => 'Nd 1'),
         array('name' => 'Nd 2'),
         array('name' => 'Hnd 1'),
         array('name' => 'Hnd 2')
      );
        
        foreach($levels as $level){
            DB::table('levels')->insert($level);
        }

    }
}
