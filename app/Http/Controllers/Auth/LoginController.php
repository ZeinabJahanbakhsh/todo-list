<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginUserRequest;
use Auth;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function login(LoginUserRequest $request): JsonResponse
    {
        $request->validated();

        if (!Auth::attempt($request->only(['email', 'password']))) {
            return response()->json([
                'message' => __('messages.operation_failed')
            ]);
        }

        $user          = Auth::user();
        $data['email'] = $user->email;
        $data['token'] = $user->createToken('login-user-token')->plainTextToken;

        return response()->json([
            'message' => __('messages.login_user_success'),
            'data'    => $data
        ]);
    }



}
