<?php


$app->get('/', function () use ($app) {
    return 'Url shorten RESTful Api';
});

$app->group(['prefix' => 'api/v1', 'namespace' => 'App\Http\Controllers'], function ($app) {
    $app->post('user', 'UserController@create');
    $app->delete('user/{id}', 'UserController@delete');
    $app->post('user/{id}/urls', 'UrlController@urls');
    $app->get('url/{id}', 'UrlController@redirectToOrig');
    $app->delete('url/{id}', 'UrlController@delete');
    $app->get('stats', 'StatsController@index');
    $app->get('stats/{id}', 'StatsController@url');
    $app->get('user/{id}/stats', 'StatsController@user');
});
