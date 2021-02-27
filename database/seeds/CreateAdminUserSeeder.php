<?php

use Illuminate\Database\Seeder;
use App\Models\Admin;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Support\Facades\Hash;
  
class CreateAdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Admin::create([
        	'name' => 'rakib', 
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin123')
        	// 'password' => bcrypt('admin123')
        ]);
  
        $role = Role::create(['name' => 'Super Admin']);
   
        $permissions = Permission::pluck('id','id')->all();
  
        $role->syncPermissions($permissions);
   
        $user->assignRole([$role->id]);






    }
}