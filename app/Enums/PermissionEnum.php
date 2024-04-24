<?php

namespace App\Enums;

enum PermissionEnum: string
{
    case is_admin = 'Is_Admin';
    case is_user  = 'Is_User';
}
