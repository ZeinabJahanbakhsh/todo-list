<?php

namespace App\Http\Controllers\Auth;

use App\Enums\RoleEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Resources\User\UserResource;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register(StoreUserRequest $request): UserResource
    {
        $request->validated();

        $user = User::forceCreate([
            'name'     => $request->string('name'),
            'email'    => $request->string('email'),
            'password' => $request->string('password'),
            'role_id'  => Role::whereCode(RoleEnum::user)->value('id') //by admin or system
        ]);

        $token = $user->createToken('register-user-token')->plainTextToken;
        $request->merge([
            'token' => $token,
        ]);

        return new UserResource($user);
    }

}
