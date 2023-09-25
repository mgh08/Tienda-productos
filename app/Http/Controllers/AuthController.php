<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\LoginRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function createUser(CreateUserRequest $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User created successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);
    }

    public function loginUser(LoginRequest $request)
    {
        if(!Auth::attempt($request->only(['email', 'password'])))
        {
            return response()->json([
                'status' => false,
                'message' => 'Invalid credentials'
            ], 401);
        }
        $user = User::where('email', $request->email)->first();
        return response()->json([
            'status' => true,
            'message' => 'User login successfully',
            'token' => $user->createToken("API TOKEN")->plainTextToken
        ], 200);

    }
}
