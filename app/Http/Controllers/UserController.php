<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Session;
use App\User;
use App\Role;
class UserController extends Controller
{
    public function index(){
        $users=User::with('roles')->get();
        $roles=Role::all();
        return view('userlist', compact('users','roles'));
    }
    public function adduser(){
        $roles=Role::all();
        return view('useradd', compact('roles'));
    }
    public function creatuser(Request $request){
        $this->validate($request, [
            'password' => 'required|string|min:6|confirmed',
            'username' => 'required|unique:users',
            'role' => 'required',
        ]);
        User::create([
            'username' => $request['username'],
            'password' => Hash::make($request['password']),
            'role' => $request['role'],
        ]);
        return redirect('userslist')->with('success','User created Successfully');
    }
    public function edit(Request $request){
    	$this->validate($request, [
            'id' => 'required',
            'role' => 'required',
        ]);
        User::where('id',$request['id'] )
            ->update(['role' =>$request['role']]);
        return redirect('userslist')->with('success','User Edit Successfully');
    }
    public function delete(Request $request){
    	$this->validate($request, [
            'id' => 'required',
        ]);
        $user = User::find($request['id']);
		$user->delete();
        return redirect('userslist')->with('success','User Deleted Successfully');
    }
}
