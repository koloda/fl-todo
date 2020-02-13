<?php

namespace app\controllers;

abstract class BaseController
{
    public function render(string $view, array $data = [])
    {
        $viewFile = SRC_DIR . '/views/' . $view . '.php';
        require SRC_DIR . '/views/main.php';
    }

    public function err404()
    {
        http_response_code(404);
        return $this->render('error', ['message' => '4XX: Bad request or page not found']);
    }

    public function error()
    {
        http_response_code(500);
        return $this->render('error', ['message' => '500: Internal server error']);
    }
}