<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\TaskController;
use App\Http\Middleware\CheckAdmin;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
    return view('auth.login');
});

Auth::routes(['register'=>false]);
Route::get('/admin', [HomeController::class, 'index'])->middleware(CheckAdmin::class);

Route::controller(TaskController::class)->group(function()
{
    Route::get('/All_Tasks' , 'tasks')->name('tasks');
    Route::get('/task_form' , 'task_form')->name('task_form');
    Route::post('/add_task' , 'add_task')->name('add_task');
    Route::get('/tasks_stats' , 'tasks_stats')->name('tasks_stats');
});
