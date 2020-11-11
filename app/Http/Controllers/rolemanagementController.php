<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Role;
use App\role_permission;
use App\Permission;
class rolemanagementController extends Controller
{
    public function index(){
        $roles=Role::all();
        return view('rolelist', compact('roles'));
    }
    public function roledetails($id){
        $role=Role::find($id);
        $rolepermissions = role_permission::where('role_id',$id)->get();
        $permissions = Permission::all();
        $permissionsTr = '';

        foreach ($permissions as $key => $permission) {
        	$rolepermissions = role_permission::where(['role_id'=>$id,'permission_id' => $permission->id])->get();
        	if (!$rolepermissions->isEmpty()) {
        		$permissionsTr .='<tr><td><input type="checkbox" name="'.$permission->id.'" checked></td><td>'.$permission->name.'</td>
        		                          </tr>';
        	}else{
        		$permissionsTr .='<tr><td><input type="checkbox" name="'.$permission->id.'" ></td><td>'.$permission->name.'</td>
        		                          </tr>';
        	}
        }
        return view('roledetail', compact('role','permissionsTr','permissions'));
    }public function changepermission(Request $request){
       $t ='';
       $role = $request['role_id'];
       role_permission::where('role_id',$role)->delete();
       foreach ($request->request as $key => $value) {
	       	if (is_int($key)) {
		       	$role_permission = new role_permission;
		       	$role_permission->role_id = $role;
		       	$role_permission->permission_id = $key;
		       	$role_permission->save();
	       	}
       }
       return redirect()->back()->with('success','Role permission modified successfully Successfully');
    }

}
