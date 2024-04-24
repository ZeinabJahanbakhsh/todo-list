<?php

namespace App\Models;

use App\Enums\PermissionEnum;
use App\Models\PermissionUser;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Permission extends Model
{
    //use HasFactory;

    protected $fillable = ['name'];
    protected $casts    = [
        'code' => PermissionEnum::class
    ];


    /*
    |--------------------------------------------------------------------------
    | Relations
    |--------------------------------------------------------------------------
    */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'permission_user')
                    ->using(PermissionUser::class)
                    ->withTimestamps();
    }
}
