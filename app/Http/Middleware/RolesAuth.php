<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use App\Role;
use App\role_permission;
use App\Permission;
class RolesAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
     
    $permissions = role_permission::with('permissions')->where('role_id',auth()->user()->role)->get();
    $currentname = $request->route()->getName();
    // echo $currentname ;
    // return response(auth()->user()->role, 403);
    foreach ($permissions as $key => $permission) {
        if ($permission->permissions->slug == $currentname) {
           return $next($request);
        }
    }
    
    $msg = 'You have no permission to access '.$currentname;
    return redirect('/')->with('danger',$msg);
    }
}
