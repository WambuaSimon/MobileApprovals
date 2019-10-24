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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    // Route::resource('agents', 'AgentController');

});

Route::prefix('v1')->group(function () {
    Route::post('login', 'UsersController@login');

    Route::group(['middleware' => 'auth:api'], function () {
        Route::post('getUser', 'UsersController@getUser');
        Route::resource('documents', 'DocumentsController')->except('show');
        Route::get('document/{DocType}', 'DocumentsController@show')->name('documents.show');
        Route::get('groups/{id}', 'GroupController@show');
        Route::resource('groups', 'GroupController')->except('show');
        Route::resource('status', 'StatusController')->except('show');
        Route::get('status/{AppStat}', 'StatusController@show')->name('status.show');
        Route::resource('workflow', 'WorkflowController');
        Route::get('groupDocs', 'WorkflowController@groupDocs');
        // Route::get('groupDocs', 'DocumentsController@groupDocs');
    });
});
