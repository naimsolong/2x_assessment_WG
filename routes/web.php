<?php

use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/auth/login');
});

Route::prefix('dashboard')->middleware('auth')->group(function() {
    Route::get('/', function () {
        return redirect('/dashboard/tasks');
    });

    Route::get('/tasks', [TaskController::class, 'viewTasks']);
    Route::get('/task/timesheet/{id}', [TaskController::class, 'viewTaskTimesheet']);

    Route::post('/task/timesheet/{id}', [TaskController::class, 'taskTimesheet']);
});

Route::prefix('auth')->group(function() {
    Route::get('/login', [AuthController::class, 'viewLogin'])->middleware('guest');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/logout', [AuthController::class, 'logout']);
});

Route::prefix('approval')->group(function() {
    Route::get('/client', [ApprovalController::class, 'viewApprovalClient']);
    Route::post('/client', [ApprovalController::class, 'ApprovalClient']);
});
