<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
        	['name' => 'SUG']
        ];

        foreach ($categories as $category) {
            DB::table('categories')->insert($category);
        }
    }
}
