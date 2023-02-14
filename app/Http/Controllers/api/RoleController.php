<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Feature;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function roleindex(){
        $role = Role::all();
        return response()->json($role);
    }

    public function permission(){
        $permission = Feature::with('permissionfeature')->get();
        return response()->json($permission);
    }

    public function rolecreate(){
        $feature = Feature::all();

        return response()->json($feature);
    }

    public function rolestore(Request $request){
        $role = Role::create([
            'name'=>$request->roleName,
        ]);

        $permission =  Role::find($role->id);
        $permission->permission()->sync($request->permission);

        return response()->json($permission);
    }  

    public function roleedit($id){
        $permission = Feature::with('permissionfeature')->get();
        $rolename = Role::where('id',$id)->with('permission')->first();
        return response()->json(array(
            'role_name'=> $rolename,
            'role_permission' => $permission
        ));
    }

    public function roleupdate(Request $request,$id){
        $rolename = Role::where('id',$id);
        $rolename->update([
            'name' => $request->roleName,
        ]);
        

        $permission = Role::find($id);
        $permission->permission()->sync($request->permission);

        $role = $rolename->with('permission')->first();

        return response()->json($role);
    }

    public function roledestroy($id){
        $role = Role::all();
        $roleid = Role::where('id',$id);
        $permission = Role::find($id);
        $permission->permission()->sync([]);
        $roleid->delete();
        return response()->json($role);
    }

}
