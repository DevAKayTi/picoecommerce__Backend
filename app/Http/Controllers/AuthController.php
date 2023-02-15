<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    public function login(Request $request){
    
        if(!Auth::attempt([
            'email' => $request->email,
            'password'=> $request->password
        ])){
            return response([
                'message' => 'Invalid'
            ],Response::HTTP_UNAUTHORIZED);
        }

        $auth = Auth::user()->id;
        $user = User::find($auth);
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('jwt',$token,60);

        return response([
            'message'=>$token
        ])->withCookie($cookie);
    }

    public function show(){

        $auth = Auth::user()->id;
        $user = User::where('id',$auth)->with('role')->first();

        $permission = Role::where('id',$user->role_id)->with('permission:id,feature_id')->first();
        return response()->json([
            'userInfo' => $user,
            'permission'=> $permission
        ]);
    }

    public function logout(){

        $cookie = Cookie::forget('jwt');

        $auth = Auth::user()->id;
        $user = User::find($auth);
        $user->tokens()->delete();

        return response([
            'message' => 'Success'
        ])->withCookie($cookie);
    }
}
