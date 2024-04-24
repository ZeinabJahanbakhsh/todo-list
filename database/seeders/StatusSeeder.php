<?php

namespace Database\Seeders;

use App\Models\Status;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = collect([
            [
                'name' => 'done',
                'code' => 'Done'
            ],
            [
                'name' => 'inProgress',
                'code' => 'InProgress'
            ]
        ]);

        $data->each(function ($value) {
            Status::create([
                'name' => $value['name'],
                'code' => $value['code'],
            ]);
        });
    }


}
