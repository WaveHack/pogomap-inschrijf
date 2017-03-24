<?php

use Illuminate\Routing\Router;

/** @var \Illuminate\Routing\Router $router */

$router->get('/')->uses('HomeController@getIndex')->name('home');

$router->get('register')->uses('RegisterController@getIndex')->name('register');
$router->post('register')->uses('RegisterController@postIndex');

$router->group(['prefix' => 'admin'], function (Router $router) {

    $router->get('/', function () {
        if (auth()->guest()) {
            return redirect()->route('auth.login');
        }

        return redirect()->route('admin.dashboard');
    });

    $router->group(['middleware' => 'guest'], function (Router $router) {

        $router->get('login')->uses('Admin\AuthController@getLogin')->name('auth.login');
        $router->post('login')->uses('Admin\AuthController@postLogin');

    });

    $router->group(['middleware' => 'auth'], function (Router $router) {

        $router->post('logout')->uses('Admin\AuthController@postLogout')->name('auth.logout');

        $router->get('dashboard')->uses('Admin\DashboardController@getIndex')->name('admin.dashboard');

        $router->get('registrations')->uses('Admin\RegistrationController@index')->name('admin.registrations.index');
        $router->get('registrations/create')->uses('Admin\RegistrationController@create')->name('admin.registrations.create');
        // store
        $router->get('registrations/{registration}')->uses('Admin\RegistrationController@show')->name('admin.registrations.show');
        // edit
        $router->put('registrations/{registration}')->uses('Admin\RegistrationController@update')->name('admin.registrations.update');
        // destroy

        $router->get('accounts')->uses('Admin\AccountController@index')->name('admin.accounts.index');
        $router->get('accounts/{account}')->uses('Admin\AccountController@show')->name('admin.accounts.show');
        $router->post('accounts/{account}')->uses('Admin\AccountController@postResetPassword')->name('admin.accounts.reset-password');

        $router->get('users')->uses('Admin\UserController@index')->name('admin.users.index');
        $router->get('users/{user}')->uses('Admin\UserController@show')->name('admin.users.show');


    });

});
