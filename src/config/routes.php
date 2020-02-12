<?php

use Pecee\Http\Middleware\BaseCsrfVerifier;
use Pecee\Http\Request;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;

SimpleRouter::setDefaultNamespace('app\controllers');

SimpleRouter::error(function (Request $request, \Exception $exception) {
    if ($exception instanceof NotFoundHttpException) {
        response()->redirect('/not-found');
    }
});
SimpleRouter::get('/not-found', function () {
    http_response_code(404);
    return '404: Page not found';
});
SimpleRouter::get('/error', function () {
    http_response_code(500);
    return '500: Internal server error';
});

SimpleRouter::get('/', 'TodoController@list');
SimpleRouter::get('/todo', 'TodoController@list');
SimpleRouter::get('/todo/create', 'TodoController@create');
SimpleRouter::get('/todo/update/{id}', 'TodoController@update');
SimpleRouter::post('/todo/store/{id?}', 'TodoController@store');

SimpleRouter::post('/auth/login', 'AuthController@login');
SimpleRouter::get('/auth/login', 'AuthController@form');
SimpleRouter::get('/auth/logout', 'AuthController@logout');

SimpleRouter::router()->setCsrfVerifier(new BaseCsrfVerifier);

SimpleRouter::start();
