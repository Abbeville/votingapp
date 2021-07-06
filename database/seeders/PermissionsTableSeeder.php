<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;

class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        
        $permissions = [
            ['name' => 'create-user'],
        ];
        foreach ($permissions as $permission){
            \Spatie\Permission\Models\Permission::create($permission);
        }

    }
}
