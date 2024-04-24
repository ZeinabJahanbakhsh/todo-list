<?php

namespace App\Helpers;

use App\Enums\RoleEnum;
use App\Models\Role;
use App\Models\User;


if (!function_exists('adminRole')) {
    function adminRole($user): bool
    {
        return $user->role_id == Role::whereCode(RoleEnum::admin)->value('id');
    }
}





