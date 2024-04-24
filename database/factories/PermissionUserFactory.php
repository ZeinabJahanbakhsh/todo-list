<?php

namespace Database\Factories;

use App\Models\Permission;
use App\Models\PermissionUser;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<PermissionUser>
 */
class PermissionUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'permission_id' => Permission::all()->random(1)->value('id'),
            'user_id'       => User::all()->random(1)->value('id')
        ];
    }
}
