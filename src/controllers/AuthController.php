<?php

namespace app\controllers;

use Pecee\SimpleRouter\SimpleRouter;

class AuthController extends BaseController
{
    const USERNAME = 'admin';
    const PASS = '123';

    public function form()
    {
        return $this->render('login');
    }

    public function login()
    {
        SimpleRouter::router()->getCsrfVerifier()->handle(request());

        $usename = trim(input('usename'));
        $pass = trim(input('password'));

        $errors = [];
        if (!strlen($usename)) {
            $errors['usename'] = 'Username is required';
        }
        if (!strlen($pass)) {
            $errors['password'] = 'Password is required';
        }

        if ($usename !== static::USERNAME || $pass !== static::PASS) {
            $errors['username'] = 'Bad credentials';
        }

        if (!count($errors)) {
            $_SESSION['IS_ADMIN'] = true;

            return redirect('/');
        }

        $_SESSION['flash'] = ['error' => $errors];
        $_SESSION['formData'] = ['username' => $usename];

        return redirect('/auth/login');
    }

    public function logout()
    {
        unset($_SESSION['IS_ADMIN']);

        return redirect('/');
    }
}