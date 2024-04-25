<?php

namespace App\Http\Controllers\Task;

use App\Enums\StatusEnum;
use App\Http\Controllers\Controller;
use App\Http\Requests\Task\StoreTaskRequest;
use App\Http\Requests\Task\UpdateTaskRequest;
use App\Http\Resources\Task\TaskResource;
use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


class TaskController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        $this->authorize('viewAny', Task::class);

        $tasks = Task::with([
            'user',
            'assignedUser',
            'status'
        ])->paginate('10', ['*'], 'page');

        return TaskResource::collection($tasks)
                           ->additional([
                               'count' => $tasks->count()
                           ]);
    }


    public function store(StoreTaskRequest $request): JsonResponse
    {
        $this->authorize('create', Task::class);

        $request->validated();

        $task = Auth::user()->tasks()->forceCreate([
            'title'       => $request->string('title'),
            'description' => $request->string('description'),
            'assigned_to' => $request->input('assigned_to'),
            'status_id'   => Status::whereCode(StatusEnum::in_progress)->value('id') //by default
        ]);

        $taskResource = new TaskResource($task);

        return response()->json([
            'message' => __('messages.store_success'),
            'data'    => $taskResource
        ]);
    }

    public function show(Task $task): TaskResource
    {
        $this->authorize('view', $task);

        return new TaskResource($task);
    }

    public function update(UpdateTaskRequest $request, Task $task): JsonResponse
    {
        $this->authorize('update', $task);

        $request->validated();

        $task->forceFill([
            'title'       => $request->string('title'),
            'description' => $request->string('description'),
            'assigned_to' => $request->input('assigned_to'),
        ])->save();

        return response()->json([
            'message' => __('messages.update_success'),
            'data'    => $task
        ]);
    }

    public function destroy(Task $task): JsonResponse
    {
        $this->authorize('delete', $task);

        $task->delete();
        return response()->json([
            'message' => __('messages.delete_success'),
        ]);
    }


}
