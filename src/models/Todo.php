<?php

namespace app\models;

use Pecee\Http\Input\InputHandler;
use Pecee\Http\Request;
use RedBeanPHP\SimpleModel;

/**
 * @property string $author
 * @property string $email
 * @property string $title
 * @property bool $done
 * @property bool $updated
 */
class Todo extends SimpleModel
{
    public static function fromInput(InputHandler $input, $todo = null)
    {
        var_dump($input->all());
        // $data = $request;
    }
}