<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = collect([
            [
                'name' => 'admin',
                'code' => 'Admin'
            ],
            [
                'name' => 'user',
                'code' => 'User'
            ]
        ]);

        $data->each(function ($value) {
            Role::create([
                'name' => $value['name'],
                'code' => $value['code'],
            ]);
        });
    }


}
