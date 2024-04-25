<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\PermissionUser;
use App\Models\Status;
use App\Models\Task;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \Schema::disableForeignKeyConstraints();

        DB::table('roles')->truncate();
        DB::table('statuses')->truncate();
        DB::table('permissions')->truncate();
        DB::table('users')->truncate();
        DB::table('permission_user')->truncate();
        DB::table('tasks')->truncate();

        $this->call([
            RoleSeeder::class,
            UserSeeder::class,
            PermissionSeeder::class,
            StatusSeeder::class,
        ]);

       /* User::factory(10)->create();
        PermissionUser::factory(10)->create();
        Task::factory(10)->create();*/

        \Schema::enableForeignKeyConstraints();
    }
}
