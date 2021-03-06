<?php

/** @var \Laravel\Lumen\Routing\Router $router */

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

$router->get('/', function () use ($router) {
	return $router->app->version();
});

$router->get('login', 'LoginController@showlogin');
$router->post('login', 'LoginController@login');
$router->get('register', 'RegisterController@showregister');
$router->post('register', 'RegisterController@register');

// aplicamos el middleware auth
$router->group(['middleware' => 'auth'], function () use ($router) {

	// aqui van todas las rutas que se necesitar estar autenticado para el acceso
	$router->post('logout', 'LoginController@logout');

});