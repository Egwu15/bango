<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'email' => 'required|unique:users,email|string',
            'password' => 'required|String',
            'phone_number' => 'required|String',
            'brand_name' => 'required|String',

        ]);

        $user = User::create([
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'phone_number' => $fields['phone_number'],
            'brand_name' => $fields['brand_name'],


        ]);
        $token = $user->createToken('mytokondiradh')->plainTextToken;

        $response = ['user' => $user, 'token' => $token];
        return response($response, 201);
    }
}
