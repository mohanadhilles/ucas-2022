<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    
    public function Register(Request $req){
        $valid = Validator::make($req->all(),[
            "name" => "required|string|min:5",
            "email" => "required|string|email|unique:users,email",
            "password" => "required|string",
            "password_confirmation" => "required|string",
            "phone" => "required|string",

        ]);

        if($valid->fails()){
            return response()->json([
                "status" => "error",
                "errors" => $valid->errors()
            ]);
        }
        $user = User::create([
            "name" => $req["name"],
            "email" => $req["email"],
            "password" => bcrypt($req["password"]),
            "password_confirmation" => bcrypt($req["password_confirmation"]),
            "phone" => $req["phone"],

        ]);
        $token = $user->createToken('my-app-token')->plainTextToken;


        return response()->json(['status' => 'Success', 'token' => $token], 201);
    }




    public function Login(Request $req)
    {
        $valid = Validator::make($req->all(),[
            "email" => "required|string|email",
            "password" => "required|string",
        ]);

        if($valid->fails()){
            return response()->json([
                "status" => "error",
                "errors" => $valid->errors()
            ]);
        }

        $credentials = request(['email', 'password']);

        if (! $token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return response()->json(['status' => 'Success', 'token' => $token], 201);
    }


    public function logout()
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    public function user(){
        
        return Auth::user();
    }
}
