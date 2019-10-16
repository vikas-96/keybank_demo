<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()['cache']->forget('maklad.permission.cache');
        
        // create permissions
        $permission = [
            /*Permissions*/
            [
                'display_name' => 'Create Permission',
                'name'         => 'create-permission',
                'guard_name'   => 'api'
            ],
            [
                'display_name' => 'View Permission',
                'name'         => 'view-permission',
                'guard_name'   => 'api'
            ],
            [
                'display_name' => 'Edit Permission',
                'name'         => 'edit-permission',
                'guard_name'   => 'api'
            ],
            [
                'display_name' => 'Delete Permission',
                'name'         => 'delete-permission',
                'guard_name'   => 'api'
            ],
            /*Roles*/
            [
                'display_name' => 'Create Role',
                'name'         => 'create-role',
                'guard_name'   => 'api'
            ],
            [
                'display_name' => 'View Role',
                'name'         => 'view-role',
                'guard_name'   => 'api'
            ],
            [
                'display_name' => 'Edit Role',
                'name'         => 'edit-role',
                'guard_name'   => 'api'
            ],
            [
                'display_name' => 'Delete Role',
                'name'         => 'delete-role',
                'guard_name'   => 'api'
            ],
            /*Users*/
            [
                'display_name' => 'Create User',
                'name'         => 'create-user',
                'guard_name'   => 'api'
            ],
            [
                'display_name' => 'View User',
                'name'         => 'view-user',
                'guard_name'   => 'api'
            ],
            [
                'display_name' => 'Edit User',
                'name'         => 'edit-user',
                'guard_name'   => 'api'
            ],
            [
                'display_name' => 'Delete User',
                'name'         => 'delete-user',
                'guard_name'   => 'api'
            ],
            /*Borrewers*/
            [
                'display_name' => 'Create Borrewer',
                'name'         => 'create-borrower',
                'guard_name'   => 'api'
            ],
            [
                'display_name' => 'View Borrewer',
                'name'         => 'view-borrower',
                'guard_name'   => 'api'
            ],
            [
                'display_name' => 'Edit Borrewer',
                'name'         => 'edit-borrower',
                'guard_name'   => 'api'
            ],
            [
                'display_name' => 'Delete Borrewer',
                'name'         => 'delete-borrower',
                'guard_name'   => 'api'
            ],
        ];

        foreach ($permission as $key => $value)
        {
            Permission::firstOrCreate($value);
        }
    }
}
