<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', 'HomeController@index');

$router->group(['middleware' => 'auth'], function () use($router) {
    $router->post('/enroll', [
        'middleware' => 'auth',
        'uses' => 'EnrollController@enrollToDatabase',
    ]);
    $router->post('/match', [
        'middleware' => 'auth',
        'uses' => 'MatchController@matchAgainstDatabase',
    ]);
});
