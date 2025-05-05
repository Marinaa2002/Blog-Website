<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function register(Request $request){
        $request -> validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|string|max:255|unique:users,email',
            'password' => 'required|string|min:5|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);
        return response() -> json([
            'message' => 'user Registered Successfully',
            'User' => $user,
        ],201);
        //return response() -> json('true');
    }

    public function login(Request $request){
        $request -> validate([
            'email' => 'required|email|string',
            'password' => 'required|string',
        ]);
        if(!Auth::attempt($request->only('email', 'password'))){
        return response() -> json([
            'message' => 'not valid',
        ],401);};
        $user = User::where('email',$request->email)->firstOrFail();
        $token = $user ->createToken('auth_Token')->plainTextToken;
        return response() -> json([
            'message' => 'user logged in  Successfully',
            'User' => $user,
            'Token' => $token,
        ],201);
    }

    public function logout(Request $request)
{
    if ($request->user()) {
        $request->user()->currentAccessToken()->delete();
    }
    
    return response()->json([
        'message' => 'User logged out successfully'
    ]);
}
}
