<?php

/** @var \Laravel\Lumen\Routing\Router $router */

use App\Http\Controllers\ProductController;

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

$router->post('/product', 'ProductController@create');
$router->get('/product', 'ProductController@index');
$router->get('/product/{id}', 'ProductController@show');
$router->put('/product/{id}', 'ProductController@update');
$router->delete('/product/{id}', 'ProductController@destroy');
