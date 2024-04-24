<?php

namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\Response;
use function App\Helpers\adminRole;

class TaskPolicy
{
    public function viewAny(User $user): bool
    {
        return adminRole($user);
    }


    public function view(User $user, Task $task): bool
    {
        return adminRole($user);
        /*if (adminRole($user)) {
            return true;
        }
        if ($task->assigned_to == null && ($task->user_id == $user->id) ){
            return true;
        }
        if ($task->assigned_to != null && ($task->assigned_to == $user->id)){
            return true;
        }
        return false;*/
    }


    public function create(User $user): bool
    {
        return adminRole($user);
    }

    public function update(User $user, Task $task): bool
    {
        return adminRole($user);
    }

    public function delete(User $user, Task $task): bool
    {
        return adminRole($user);
    }


}
