<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = collect([
            [
                'name' => 'is_admin',
                'code' => 'Is_Admin'
            ],
            [
                'name' => 'is_user',
                'code' => 'Is_User'
            ]
        ]);

        $data->each(function ($value) {
            Permission::create([
                'name' => $value['name'],
                'code' => $value['code'],
            ]);
        });
    }


}
