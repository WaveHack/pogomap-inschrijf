<?php

use Illuminate\Routing\Router;

/** @var \Illuminate\Routing\Router $router */

$router->get('/')->uses('RegisterController@getIndex')->name('register');
$router->post('/')->uses('RegisterController@postIndex');

$router->group(['prefix' => 'admin'], function (Router $router) {

    $router->get('/')->uses('AdminController@getIndex')->name('admin');

    $router->get('login')->uses('AuthController@getLogin')->name('admin.login');
    $router->post('login')->uses('AuthController@postLogin');

    $router->group(['middleware' => 'auth'], function (Router $router) {

        $router->post('logout')->uses('AuthController@postLogout')->name('admin.logout');

        $router->get('dashboard')->uses('AdminController@getDashboard')->name('admin.dashboard');

        // registrations

        // accounts

    });

});
