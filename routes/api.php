<?php

/** @var \Laravel\Lumen\Routing\Router $router */

$router->group(['prefix' => 'api', 'as' => 'api'], function() use ($router){
    // /users/*
    $router->group(['prefix' => 'users', 'as' => 'Users'], function() use ($router) {
        $router->post('/register', 'Users\RegisterController@handle');
        $router->post('/login', 'Users\LoginController@handle');
    });

    // /foods/*
    $router->group(['prefix' => 'foods', 'as' => 'Foods'], function() use ($router) {
        $router->get('/', 'Foods\ListAllFoodsController@handle');
        $router->get('/featured', function () {});

        $router->post('/rate/{foodID}/note/{note}', 'Rate\RateFoodController@handle');
    });
});
