<?php

namespace app\models;

use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use RedBeanPHP\R;
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
    /**
     * Update existing or create new tsk from input (get or post)
     *
     * @param $todo
     *
     * @return bool|array
     */
    public static function fromInput(int $id = null)
    {
        $successMsg = 'Task added';

        if (!$id) {
            $todo = R::dispense('todo');
        } else {
            $todo = R::load('todo', $id);

            if (!$todo) {
                throw new NotFoundHttpException();
            }

            $successMsg = 'Task created';
        }

        $data = [
            'author'    => input('author'),
            'email'     => input('email'),
            'title'     => input('title'),
        ];

        $data = array_map('trim', $data);

        //validation
        $errors = [];
        if (!strlen($data['author'])) {
            $errors['author'] = 'Author\'s name is required';
        }
        if (!strlen($data['email'])) {
            $errors['email'] = 'Email is required';
        }
        if (!strlen($data['title'])) {
            $errors['title'] = 'Task description is required';
        }
        if (strlen ($data['email']) && filter_var($data['email'], FILTER_VALIDATE_EMAIL) === false) {
            $errors['email'] = 'Email must be correct email address';
        }

        if (!count($errors)) {
            foreach ($data as $key => $value) {
                $todo->$key = $value;
            }

            R::store($todo);
            $_SESSION['flash'] = ['success' => $successMsg];

            return true;
        }

        $_SESSION['flash']['error'] = $errors;
        $_SESSION['formData'] = $data;

        return false;
    }
}