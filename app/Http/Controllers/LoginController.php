<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use App\Exceptions\WrongCredentialException;

class LoginController extends Controller
{
    public function login(LoginRequest $request)
    {    
        $user = User::where('email', $request->email)->firstOrFail();
    
        if (!Hash::check($request->password, $user->password)) {
            throw new WrongCredentialException('Invalid credentials', 403);
        }

        return new UserResource($user);
    }
}
