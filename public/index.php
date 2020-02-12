<?php

spl_autoload_register(function ($class)
{
    $prefix = 'app\\';
    $baseDir = realpath(__DIR__ . '/../src/') . '/';
    $len = strlen($prefix);

    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relativeClass = substr($class, $len);
    $file = $baseDir . str_replace('\\', '/', $relativeClass) . '.php';

    if (file_exists($file)) {
        require $file;
    }
});

define('SRC_DIR', realpath(__DIR__ . '/../src/'));

session_start();
define('IS_ADMIN', isset($_SESSION['IS_ADMIN']));

require_once realpath(__DIR__ . '/../vendor/autoload.php');
require_once realpath(__DIR__ . '/../src/data/db.php');
require_once realpath(__DIR__ . '/../src/helpers.php');
require_once realpath(__DIR__ . '/../src/config/routes.php');
