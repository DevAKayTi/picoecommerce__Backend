<?php

namespace App\Http\Controllers;

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

        $user = Auth::user();
        $token = $user->createToken('token')->plainTextToken;
        $cookie = cookie('jwt',$token,60);

        return response([
            'message'=>$token
        ])->withCookie($cookie);
        }

    public function show(){

        $user = Auth::user()->with('role')->first();
        return response()->json($user);
    }

    public function logout(){

        $cookie = Cookie::forget('jwt');

        Auth::user()->tokens()->delete();

        return response([
            'message' => 'Success'
        ])->withCookie($cookie);
    }
}
