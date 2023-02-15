<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function userindex(){
        $users = User::with('role')->get();
        return response()->json($users);
    }

    public function usercreate(){
        $role = Role::all();
        return response()->json($role);
    }

    public function userstore(Request $request){
        $user = User::create([
            'name' => $request->name,
            'username'=>$request->username,
            'role_id' =>$request->role,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'gender'=>$request->gender,
            'is_active'=>$request->isactive
        ]);

        return response()->json($user);
    }

    public function useredit($id){
        $role = Role::all();
        $userinfo = User::where('id',$id)->with('role')->first();
        return response()->json(array(
            'role' => $role,
            'userinfo' => $userinfo
        ));
    }

    public function userupdate(Request $request,$id){
        // return $request;
        $user = User::where('id',$id);
        $user->update([
            'name' => $request->name,
            'username'=>$request->username,
            'role_id' =>$request->role,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'gender'=>$request->gender,
            'is_active'=>$request->isactive
        ]);

        return response()->json($user);
    }

    public function userdestroy($id){
        $user = User::where('id',$id);
        $user->delete();
        return response([
            'message'=>'success'
        ]);
    }

    public function userdetail($id){
        $userindex = User::select('id','name')->get();
        $user = User::where('id',$id)->with('role')->first();

        return response()->json(array(
            'userfilter' => $userindex,
            'user' => $user
        ));
    }
}
