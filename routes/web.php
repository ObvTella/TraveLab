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

$router->get('/', function () use ($router) //INDEX ROUTE https://marconicloud.it/b_utente14/TRAVELAB/public/
{
    //return $router->app->version(); //ritorna la versione di laravel
    return "TraveLab"; //stampo TraveLab nell'index
});


$router->group(['prefix'=>'travelab/v1'], function() use($router) // travelab ROUTE https://marconicloud.it/b_utente14/TRAVELAB/public/travelab/v1/
{
    // tutte le destinazioni
    $router->get('/destination','DestinationController@index'); // METODO GET:  https://marconicloud.it/b_utente14/TRAVELAB/public/travelab/v1/destination/
    // creo una destinazione
    $router->post('/destination','DestinationController@store'); // METODO POST:  https://marconicloud.it/b_utente14/TRAVELAB/public/travelab/v1/destination/
    // cancello una destinazione
    $router->delete('/destination/{id}','DestinationController@destroy'); // METODO DELETE:  https://marconicloud.it/b_utente14/TRAVELAB/public/travelab/v1/destination/{id}
    // una sola destinazione
	$router->get('/destination/{id}', 'DestinationController@detail'); // METODO GET:  https://marconicloud.it/b_utente14/TRAVELAB/public/travelab/v1/destination/{id}
	// aggiorna una destinazione
	$router->put('/destination', 'DestinationController@update'); // METODO PUT: https://marconicloud.it/b_utente14/TRAVELAB/public/travelab/v1/destination/destination
    
    //$router-> metodo della chiamata ('/rotta/{eventuale nome variabile}', 'NomeController@MetodoController');
});