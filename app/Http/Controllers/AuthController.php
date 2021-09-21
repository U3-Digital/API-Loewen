<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function registro(Request $request){
        $datos = $request->validate([
            'name'=>'required|string',
            'email'=>'required|string|unique:users,email',
            'password' => 'required|string|confirmed'
        ]);
        $user = User::create([
            'name'=> $datos['name'],
            'email'=>$datos['email'],
            'password' => bcrypt($datos['password'])
        ]);
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }
    public function login(Request $request){
        $datos = $request->validate([
            'email'=>'required|string',
            'password' => 'required|string'
        ]);


        $user = User::where('email',$datos['email'])->first();
        if(!$user || !Hash::check($datos['password'],$user->password)){
            return response([
                'message' => 'Fallo en el inicio de sesión'
            ], 401);
        }
        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];
        return response($response, 201);
    }

    public function logout(Request $request){
        auth()->user()->tokens()->delete();
        return [
            'message' => 'Sesión cerrada.'
        ];
    }
}
