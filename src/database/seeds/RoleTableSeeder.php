<?php

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$all_role = Role::pluck('name');
        $all_permissions = Permission::all();

        if(!$all_permissions->isEmpty()){

	        /* Admin */
	        $admin_role = Role::firstOrCreate([
	            'display_name' 	=> 'Admin',
	            'name' 		   	=> 'admin',
	            'guard_name'	=> 'api'
	        ]);
	        /* data-operator */
			$data_operator_role = Role::firstOrCreate([
	            'display_name' => 'Data Operator',
	            'name' 		   => 'data-operator',
	            'guard_name'	=> 'api'
	        ]);

	        
	        foreach($all_permissions as $permission) {
	            $admin_role->givePermissionTo($permission);
	            $data_operator_role->givePermissionTo($permission);
	        }	

	        /* banker */
	        $banker_role = Role::firstOrCreate([
	            'display_name' => 'Banker',
	            'name' 		   => 'banker',
	            'guard_name'	=> 'api'
	        ]);

	        $banker_role->givePermissionTo(['create-permission','edit-permission']);

	        
	    }else{
	    	throw new Exception("First Create Permissions", 1);
	    }
    }
}
