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

try {

$router->get('/', function () use ($router) {
    return $router->app->version();
});
$router->group(['prefix' => 'api'] , function () use($router){
    $router->get('/test' , 'ExampleController@index');
});
$router->get('/api/books' , 'BookController@index');
$router->post('/api/books/store' , 'BookController@store');
$router->get('/api/books/{book}/show' , 'BookController@show');
$router->delete('/api/books/{book}/delete' , 'BookController@delete');
$router->post('/api/books/{book}/update' , 'BookController@update');
$router->post('/api/login' , 'AuthController@login');

} catch (\Throwable $th) {
    return $th ;
}
