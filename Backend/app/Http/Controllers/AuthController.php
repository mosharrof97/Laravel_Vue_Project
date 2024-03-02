<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class AuthController extends Controller
{
    public function register( Request $request){
        $request->validate([
            'name'=>'required | string',
            'email'=>'required | email',
            'password'=>'required',
        ]);

        $user = User::create([
            'name'=>$request->name,
            'email'=>$request->email,
            'password'=>bcrypt($request->password),
        ]);

        return response()->json([
            'user'=>$user,
        ], 201);

    }

    public function login( Request $request){
        $request->validate([
            'email'=>'required | email',
            'password'=>'required',
        ]);

        if(!Auth::attempt($request->only('email','password'))){
            return response()->json([
                'message'=> 'Login not valid',
            ],401);
        }
        $user = $request->user();
        $token = $user->createToken('authToken')->plainTextToken;
        return response()->json([
            'user'=>$user,
            'token' => $token,
        ]);

    }

    public function logout( Request $request){
        $request->user()->tokens()->delete();
        return response()->json(['message' => 'Logged out']);
    }
}
