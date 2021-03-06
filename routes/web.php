<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::group( ['middleware' => 'auth' ], function()
{
	Route::get('getTasksbyGroupId/{groupId}', 'GroupController@getTasksByGroupId');
	Route::get('changeTaskController/{taskId}', 'TaskController@changeTaskStatus');
	// Route::get('groups','GroupController@index');
	// Route::post('groups','GroupController@store');
	// Route::get('groups/create','GroupController@create');
	// Route::delete('groups/{groupgroup}','GroupController@destroy');
	// Route::patch('groups/{group}','GroupController@update');
	// Route::get('groups/{group}/edit','roupController@edit');

    Route::resource('groups','GroupController');
    Route::resource('tasks','TaskController');
    
});

