<?php

// use ActiveRecord\Config;

// Config::initialize(function (Config $cfg) {
//     $cfg->set_model_directory(realpath(__DIR__ . '/../models'));
//     $cfg->set_connections([
//         'default'   => 'sqlite://unix(' . realpath(__DIR__ .'/../../data/data.db') . ')'
//     ]);
//     $cfg->set_default_connection('default');
// });

use RedBeanPHP\R;

R::setup('sqlite:../src/data/todo.sqlite3');
