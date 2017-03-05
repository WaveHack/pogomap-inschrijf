<?php

/** @var \Illuminate\Routing\Router $router */

$router->get('/')->uses('RegisterController@getIndex')->name('register');
