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

    response()->redirect('/error');
});
SimpleRouter::get('/not-found', 'TodoController@err404');
SimpleRouter::get('/error', 'TodoController@error');

SimpleRouter::get('/', 'TodoController@list');
SimpleRouter::get('/todo', 'TodoController@list');
SimpleRouter::get('/todo/create', 'TodoController@create');
SimpleRouter::get('/todo/update/{id}', 'TodoController@update');
SimpleRouter::post('/todo/store/{id?}', 'TodoController@store');
SimpleRouter::get('/todo/purge', 'TodoController@purge');

SimpleRouter::post('/auth/login', 'AuthController@login');
SimpleRouter::get('/auth/login', 'AuthController@form');
SimpleRouter::get('/auth/logout', 'AuthController@logout');

SimpleRouter::router()->setCsrfVerifier(new BaseCsrfVerifier);

SimpleRouter::start();
