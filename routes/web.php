<?php

use App\Enums\RoleEnum;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    dd(
        User::where('role_id', \App\Models\Role::whereCode(RoleEnum::admin)->value('id'))->get()
    );
    return view('welcome');
});
