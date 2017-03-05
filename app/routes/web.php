<?php

/** @var \Illuminate\Routing\Router $router */

$router->get('/', function () {

    $registrations = \App\Models\Registration::all();

    dd($registrations);

    return view('welcome');
});
