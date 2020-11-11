<?php

use Illuminate\Database\Seeder;
use App\Permission;
class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){
        $permission_ids = [];

		// foreach (Route::getRoutes()->getRoutes() as $key => $route) {
		// 	 $action = $route->getActionname();
		// 	 $_action = explode('@',$action);
			 
		// 	 $controller = $_action[0];
		// 	 $controller = $route->getPath();
		// 	 $method = $route->getName();
			 
		// 	 $permission_check = Permission::where(
		// 	         ['slug'=>$controller]
		// 	     )->first();
		// 	 if(!$permission_check){
		// 	   $permission = new Permission;
		// 	   $permission->name = $method;
		// 	   $permission->slug = $controller;
		// 	   $permission->save();
		// 	   $permission_ids[] = $permission->id;
		// 	 }
		// }
		// $admin_role = Role::where('name','admin')->first();
		// $admin_role->permissions()->attach($permission_ids);

		 $user = [
            [
               'name'=>'User list',
               'slug'=>'userslist',
            ],[
               'name'=>'Add User',
               'slug'=>'adduser',
            ],
            [
               'name'=>'Edit User',
               'slug'=>'edituser',
            ],[
               'name'=>'Delete User',
               'slug'=>'deleteuser',
            ],[
               'name'=>'Role management',
               'slug'=>'rolemanagement',
            ],[
               'name'=>'Role details',
               'slug'=>'rolepermissrionlist',
            ],[
               'name'=>'Role permission change',
               'slug'=>'changepermission',
            ],
        ];
  
        foreach ($user as $key => $value) {
            Permission::create($value);
        }
	}
}
