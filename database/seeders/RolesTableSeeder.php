<?php

namespace Database\Seeders;
use Illuminate\Database\Seeder;

/**
 * 
 */
class RolesTableSeeder extends Seeder
{
	
	public function run()
	{
		// app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
		
		// $permissions = \Spatie\Permission\Models\Permission::all();
        $adminRole = \Spatie\Permission\Models\Role::create(['name' => 'admin']);
        // $adminRole->syncPermissions($permissions);
        $studentRole = \Spatie\Permission\Models\Role::create(['name' => 'student']);
        $excoRole = \Spatie\Permission\Models\Role::create(['name' => 'exco']);
        // $studentRole->givePermissionTo('view-company');
        // $excoRole->givePermissionTo('view-companies');
	}
}