<?php

/** @var \Illuminate\Routing\Router $router */

// $router->get('/test', 'TaskController@test');

$router->group(['prefix' => '/tasks', 'middleware' => 'auth'], function() use ($router) {
    $router->get('/', 'TaskController@getAll');
    $router->get('/{id}', 'TaskController@getById');
    $router->post('/', 'TaskController@create');
    $router->put('/{id}', 'TaskController@update');
    $router->delete('/{id}', 'TaskController@delete');
});

