<?php

namespace app\controllers;

abstract class BaseController
{
    public function render(string $view, array $data = [])
    {
        $viewFile = SRC_DIR . '/views/' . $view . '.php';
        require SRC_DIR . '/views/main.php';
    }
}