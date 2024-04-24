<?php

namespace Database\Factories;

use App\Enums\RoleEnum;
use App\Models\Role;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Task>
 */
class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        return [
            'title'       => fake()->title(),
            'description' => fake()->text(2000),
            'user_id'     => User::where('role_id', Role::whereCode(RoleEnum::admin)->value('id'))->get()->random(1)->value('id'),
            'assigned_to' => User::where('role_id',  Role::whereCode(RoleEnum::user)->value('id'))->get()->random(1)->value('id'),
            //'role_id'  => Role::where('code', '<>', RoleEnum::admin)->get()->random(1)->value('id'),

            'status_id' => Status::all()->random(1)->value('id'),];
    }
}
