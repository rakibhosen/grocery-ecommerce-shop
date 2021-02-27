<?php


use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;


class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    //    $permissions = [
    //        'dashboard.view',
    //        'role.view',
    //        'role.create',
    //        'role.edit',
    //        'role.delete',
    //        'product.view',
    //        'product.create',
    //        'product.edit',
    //        'product.delete',
    //        'admin.view',
    //        'admin.create',
    //        'admin.edit',
    //        'admin.delete'
    //     ];
   
    //     foreach ($permissions as $permission) {
    //          Permission::create(['name' => $permission]);
    //     }
    $permissions = [

        [
            'group_name' => 'dashboard',
            'permissions' => [
                'dashboard.view',
                'dashboard.edit',
            ]
        ],
        [
            'group_name' => 'blog',
            'permissions' => [
                // Blog Permissions
                'blog.create',
                'blog.view',
                'blog.edit',
                'blog.delete',
                'blog.approve',
            ]
        ],
        [
            'group_name' => 'admin',
            'permissions' => [
                // admin Permissions
                'admin.create',
                'admin.view',
                'admin.edit',
                'admin.delete',
                'admin.approve',
            ]
        ],
        [
            'group_name' => 'role',
            'permissions' => [
                // role Permissions
                'role.create',
                'role.view',
                'role.edit',
                'role.delete',
                'role.approve',
            ]
        ],
        [
            'group_name' => 'profile',
            'permissions' => [
                // profile Permissions
                'profile.view',
                'profile.edit',
            ]
        ],
    ];


    // Create and Assign Permissions
    for ($i = 0; $i < count($permissions); $i++) {
        $permissionGroup = $permissions[$i]['group_name'];
        for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
            // Create Permission
            $permission = Permission::create(['name' => $permissions[$i]['permissions'][$j], 'group_name' => $permissionGroup]);
            // $roleSuperAdmin->givePermissionTo($permission);
            // $permission->assignRole($roleSuperAdmin);
        }
    }





    }
}