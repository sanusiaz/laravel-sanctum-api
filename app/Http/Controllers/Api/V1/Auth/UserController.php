<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\Api\V1\StoreUserRequest;
use Illuminate\Http\Response;

class UserController extends Controller
{
    public function register( StoreUserRequest $request )
    {
        // validate request
        $request->validated();

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        return response()->json([
            'data' => $user,
            'token' => $token
        ], 201);
    }


    public function logout() 
    {
        auth()->user()->tokens()->delete();

        return response()->json([
            'message' => 'logout successful'
        ], 201);
    }

    public function login( Request $request )
    {
        $this->validate($request, [
            'email' => ['email', 'required', 'max:255'],
            'password' => ['required', 'max:255']
        ]);

        $user = User::where('email', $request->email)->first();

        if ( $user !== null )  
        {
            if ( Hash::check($request->password, $user->password) ) {
                // create new token 
                $token = $user->createToken('myapptoken')->plainTextToken;

                return response()->json([
                    'data' => [
                        'email' => $request->email,
                        'token' => $token
                    ]
                ], 201);
            }
        }

        return response()->json([
            'message' => 'Invalid Credentials'
        ], 401);
    }
}
