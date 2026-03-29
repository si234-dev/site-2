<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->get('/', function () use ($router) {
    return $router->app->version();
});

/*
|--------------------------------------------------------------------------
| User CRUD (Site 1)
|--------------------------------------------------------------------------
*/



$router->get('/products', 'ProductController@getProducts');
$router->post('/products', 'ProductController@add');
$router->get('/products/{id}', 'ProductController@show');
$router->put('/products/{id}', 'ProductController@update');
$router->delete('/products/{id}', 'ProductController@delete');