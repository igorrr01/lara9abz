<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Validator;

class UserController extends Controller
{
    public function index ()
    {
        $users = User::all();

        if(!$users){
            return response()->json([
                "status code" => 404,
                "message" => "Users not found!"
            ])->setStatusCode(404);;
        }

        return response()->json([
            "status" => true,
            "users" => $users
        ])->setStatusCode(200);;
    }

    public function store (Request $request)
    {
        $request_data = $request->only(['first_name','last_name','city','birthday','email','password']);

        $validate = Validator::make($request_data,[
            'first_name' => 'required|min:3|max:15',
            'last_name' => 'required|min:3|max:15',
            'city' => 'required|min:4|max:15',
            'birthday' => 'required|date',
            'email' => 'required|unique:users|min:4|max:35',
            'password' => 'required|min:6|max:256',
        ]);

        if($validate->fails()){
            return response()->json([
                "status" => false,
                "errors" => $validate->messages()
            ])->setStatusCode(422);
        }

        User::create([
            "first_name" => $request_data['first_name'],
            "last_name" => $request_data['last_name'],
            "city" => $request_data['city'],
            "birthday" => $request_data['birthday'],
            "email" => $request_data['email'],
            "password" => Hash::make($request_data['password']),
        ]);

        return response()->json([
            "status" => true,
            "user" => $request_data,
        ])->setStatusCode(201);
    }
    
}
