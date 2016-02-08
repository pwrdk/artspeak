<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', [
    'as'    => 'main',
    'uses'  => 'MainController@index'
]);

Route::get('/input', [
    'as'    => 'input.main',
    'uses'  => 'MainController@input'
]);

Route::get('api/words', [
    'as'    => 'api.words',
    'uses'  => 'MainController@words'
]);


Route::post('api/remove', [
    'as'    => 'api.remove',
    'uses'  => 'MainController@remove'
]);

Route::post('api/add', [
    'as'    => 'api.add',
    'uses'  => 'MainController@add'
]);


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
