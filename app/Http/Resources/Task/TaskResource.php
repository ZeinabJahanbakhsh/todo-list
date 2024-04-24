<?php

namespace App\Http\Resources\Task;

use App\Http\Resources\User\UserResource;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;


/**
 * @mixin Task
 */
class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'          => $this->id,
            'title'       => $this->title,
            'description' => $this->description,
            'status'      => new StatusResource($this->status),
            'user'        => new UserResource($this->user),
            'assigned_to' => new UserResource($this->assignedUser),
        ];
    }
}
