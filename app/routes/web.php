<?php

use Illuminate\Routing\Router;

/** @var \Illuminate\Routing\Router $router */

$router->get('/')->uses('HomeController@getIndex')->name('home');

$router->get('register')->uses('RegisterController@getIndex')->name('register');
$router->post('register')->uses('RegisterController@postIndex');

$router->group(['prefix' => 'admin', 'as' => 'admin.'], function (Router $router) {

    $router->get('/', function () {
        if (auth()->guest()) {
            return redirect()->route('admin.auth.login');
        }

        return redirect()->route('admin.dashboard');
    })->name('home');

    $router->group(['middleware' => 'guest'], function (Router $router) {

        $router->get('login')->uses('Admin\AuthController@getLogin')->name('auth.login');
        $router->post('login')->uses('Admin\AuthController@postLogin');

    });

    $router->group(['middleware' => 'auth'], function (Router $router) {

        $router->post('logout')->uses('Admin\AuthController@postLogout')->name('auth.logout');

        $router->get('dashboard')->uses('Admin\DashboardController@getIndex')->name('dashboard');

        $router->resource('registrations', 'Admin\RegistrationController');

        $router->resource('accounts', 'Admin\AccountController');
        $router->post('accounts/{account}')->uses('Admin\AccountController@postResetPassword')->name('accounts.reset-password');

        $router->resource('users', 'Admin\UserController');

    });

});

$router->get('test')->uses('TestController')->name('test');
