<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::resource('groups','GroupController');
    Route::resource('tasks','TaskController');
    Route::get('getTasksbyGroupId/{groupId}', 'GroupController@getTasksByGroupId');
	Route::get('changeTaskController/{taskId}', 'TaskController@changeTaskStatus');
   
});

