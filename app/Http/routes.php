<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::get('/', [
    'uses' => 'PlayersController@index'
]);

Route::get('/players',[
    'uses' => 'PlayersController@index'
]);

Route::get('/poolers',[
    'uses' => 'PoolersController@index'
]);

Route::resource('skaters', 'SkatersController');
Route::resource('teams', 'TeamsController');
Route::resource('goalers', 'GoalersController');