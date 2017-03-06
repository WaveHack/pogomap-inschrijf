<?php

use Illuminate\Routing\Router;

/** @var \Illuminate\Routing\Router $router */

$router->get('/')->uses('RegisterController@getIndex')->name('register');
$router->post('/')->uses('RegisterController@postIndex');

$router->group(['prefix' => 'admin'], function (Router $router) {

    $router->get('/', function () {
        if (auth()->guest()) {
            return redirect()->route('auth.login');
        }

        return redirect()->route('admin.dashboard');
    });

    $router->get('login')->uses('Admin\AuthController@getLogin')->name('auth.login');
    $router->post('login')->uses('Admin\AuthController@postLogin');

    $router->group(['middleware' => 'auth'], function (Router $router) {

        // todo: POST
        $router->get('logout')->uses('Admin\AuthController@getLogout')->name('auth.logout');

        $router->get('dashboard')->uses('Admin\DashboardController@getIndex')->name('admin.dashboard');

        $router->get('registrations/{registration}')->uses('Admin\RegistrationController@show')->name('admin.registrations.show');
        $router->put('registrations/{registration}')->uses('Admin\RegistrationController@update')->name('admin.registrations.update');

        // accounts

    });

});
