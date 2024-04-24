<?php

namespace App\Http\Controllers\Task;

use App\Http\Controllers\Controller;
use App\Models\Status;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ChangeStatusController extends Controller
{
    public function changeStatus(Task $task, Request $request): JsonResponse
    {
        $status = Status::findOrFail($request->integer('status_id'));

        $task->forceFill([
            'status_id' => $status->id
        ])->save();

        return response()->json([
            'message' => __('messages.change_status'),
        ]);
    }


}
