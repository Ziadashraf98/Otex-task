<?php

use App\Http\Controllers\Api\TaskControllerApi;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });


Route::group(['middleware' => 'auth:sanctum'], function(){
    Route::post('/create_task' , [TaskControllerApi::class , 'create_task']);
    Route::get('/all_tasks' , [TaskControllerApi::class , 'all_tasks']);
});

Route::post('/login' , [UserController::class , 'login']);


