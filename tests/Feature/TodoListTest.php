<?php

namespace Tests\Feature;

use App\Models\Task;
use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;


class TodoListTest extends TestCase
{

    use DatabaseMigrations;


    /** @test */
    public function test_successfully_index_todo_list()
    {
        $response = $this->getJson(route('tasks.index'));

        $response->assertJson([
            "data"  => [],
            "count" => 0
        ]);
    }


    /** @test */
    public function test_successfully_create_task()
    {
        $task = Task::create([
            'title'       => fake()->title(),
            'description' => fake()->text(100),
            'user_id'     => 1,
            'assigned_to' => null,
            'role_id'     => 2,
            'status_id'   => 1
        ]);

        $response = $this->getJson(route('tasks.store'));

        $this->assertJson($task);
    }


    /** @test */
    public function test_successfully_show_task()
    {
        $task = Task::create([
            'title'       => fake()->title,
            'description' => fake()->text(100),
            'user_id'     => 1,
            'assigned_to' => null,
            'status_id'   => 1
        ]);

        $response = $this->getJson(route('tasks.show', $task));

        $this->assertDatabaseHas('tasks', [
            'id'          => $task->id,
            'title'       => $task->title,
            'description' => $task->description,
            'user_id'     => $task->user_id,
            'assigned_to' => null,
            'status_id'   => $task->status_id,
        ]);
    }


    /** @test */
    public function test_successfully_update_task()
    {
        $task = Task::create([
            'title'       => fake()->title,
            'description' => fake()->text(2000),
            'user_id'     => 1,
            'assigned_to' => null,
            'status_id'   => 1
        ]);

        $task->title       = "title_update";
        $task->description = "description_update";
        $task->save();

        $response = $this->getJson(route('tasks.update', $task));

        $this->assertDatabaseHas('tasks', [
            'id'          => $task->id,
            'title'       => $task->title,
            'description' => $task->description,
            'user_id'     => $task->user_id,
            'assigned_to' => null,
            'status_id'   => $task->status_id,
        ]);
    }


    /** @test */
    public function test_successfully_delete_task()
    {
        $task = Task::create([
            'title'       => fake()->title,
            'description' => fake()->text(2000),
            'user_id'     => 1,
            'assigned_to' => null,
            'status_id'   => 1
        ]);

        $response = $this->getJson(route('tasks.destroy', $task));

        $task->delete();

        $this->assertDatabaseCount('tasks', 0);
    }



}
