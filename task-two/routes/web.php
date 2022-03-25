<?php

/** @var \Laravel\Lumen\Routing\Router $router */
use App\Http\Controllers\ArticlesController;
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

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api'], function ($router) {

    /**
     * Articles
     */
    $router->get('articles', 'ArticlesController@index');
    $router->get('articles/{id}', 'ArticlesController@show');
    $router->put('articles/{id}', 'ArticlesController@update');
    $router->post('articles', 'ArticlesController@store');
    $router->delete('articles/{id}', 'ArticlesController@destroy');
});
