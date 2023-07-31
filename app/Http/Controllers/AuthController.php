<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function register (Request $request) {
        $fields= $request->validate([
            'username' => [
                'required',
                'string',
                'max:255',
                'unique:users',
                'alpha_dash',
            ],
            'name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users',
            ],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user=User::create([
            'username' => $fields['username'],
            'name' => $fields['name'],
            'email' => $fields['email'],
            'password' => $fields['password'],
        ]);

        $token = $user->createToken('usertoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response ($response, 201) ;
    }

    public function login (Request $request){
        $fields= $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);
        $user = User::where('email',$fields['email'])->first();
        if(!$user || !Hash::check($fields['password'] , $user->password)){
            return response( [
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('usertoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response ($response, 201) ;
    }


    public function logout (Request $request) {
        auth()->user()->tokens()->delete() ;
        return [
            'message' => 'Logged out'
        ];
    }
}
