<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = array(
         array('name' => 'Computer Science', 'short_name' => 'Com.Sci'),
         array('name' => 'Math $ Stat', 'short_name' => 'MTS')
      );
        
        foreach($departments as $department){
            DB::table('departments')->insert($department);
        }
    }
}
