<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Task\ChangeStatusController;
use App\Http\Controllers\Task\TaskController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::post('/register', [RegisterController::class, 'register']);

Route::post('/login', [LoginController::class, 'login']);


Route::prefix('dashboard/admin')->middleware(['auth:sanctum', 'is.admin'])->group(function () {

    Route::resource('tasks', TaskController::class)->except('edit', 'create');

    Route::post('tasks/{task}/change-status', [ChangeStatusController::class, 'changeStatus']);

});
