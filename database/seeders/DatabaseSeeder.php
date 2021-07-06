<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fee;
use App\Models\Level;
use App\Models\Setting;
use App\Models\Contest;
use App\Models\Category;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        /*Fee::truncate();
        Level::truncate();
        Setting::truncate();
        Contest::truncate();
        Category::truncate();*/

        $this->call([
            DeviceTableSeeder::class
            DepartmentTableSeeder::class,
            LevelTableSeeder::class,
            // PermissionsTableSeeder::class,
            RolesTableSeeder::class,
            UserSeeder::class,
            SettingsTableSeeder::class,
            CategoriesTableSeeder::class,
            ContestsTableSeeder::class,
        ]);
    }
}
