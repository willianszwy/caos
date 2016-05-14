<?php


$app->get('/', function () use ($app) {
    return "Caos url shorten RESTful Api";
});

$app->group(['prefix' => 'api/v1','namespace' => 'App\Http\Controllers'], function($app)
{
    $app->post('user','UserController@create');
    $app->delete('user/{id}','UserController@delete');
});
