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


$router->get('/comunals', 'ComunalController@index');
$router->post('/comunals', 'ComunalController@store');
$router->get('/comunals/{comunal}', 'ComunalController@show');
$router->put('/comunals/{comunal}', 'ComunalController@update');
$router->patch('/comunals/{comunal}', 'ComunalController@update');
$router->delete('/comunals/{comunal}', 'ComunalController@destroy');


$router->get('/invoices', 'InvoiceController@index');
$router->get('/invoices/{invoice}', 'InvoiceController@show');

$router->get('/docs/{doc}', 'DocController@show');