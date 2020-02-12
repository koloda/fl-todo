<?php

namespace app\controllers;

use app\models\Todo;
use Pecee\SimpleRouter\Exceptions\NotFoundHttpException;
use Pecee\SimpleRouter\SimpleRouter;
use RedBeanPHP\R;

class TodoController extends BaseController
{
    const PER_PAGE = 3;

    public function list()
    {

        //i know fat controllers is bad
        // and this sorting and paging logics must be in separate components
        // but for our case ... ))
        $sortTypes = ['author', 'email', 'done', 'author DESC', 'email DESC', 'done DESC'];
        $sort = input('sort', null);
        if ($sort && in_array($sort, $sortTypes)) {
            $sortSql = " ORDER BY {$sort} ";
        } else {
            $sortSql = '';
        }
        $offset = (int) input('offset', 0);
        $offsetSql = " LIMIT {$offset}, " . static::PER_PAGE;
        $sql = '1 ' . $sortSql . $offsetSql;
        $todos = R::findAll('todo', $sql);
        $total = R::count('todo');

        //paging
        $next = false;
        $prev = false;

        if ($total > $offset + static::PER_PAGE) {
            $next = $offset + static::PER_PAGE;
        }

        if ($offset !== 0) {
            $prev = $offset - static::PER_PAGE;
        }

        //sorting
        $sortings = [];
        foreach (['author', 'email', 'done'] as $sortAttribute) {
            if (strpos($sort, $sortAttribute) !== false && $sort === $sortAttribute) {
                $sortings[$sortAttribute] = "{$sortAttribute} DESC";
            } else {
                $sortings[$sortAttribute] = $sortAttribute;
            }
        }

        return $this->render('list', compact('todos', 'next', 'prev', 'sortings', 'total'));
    }

    public function create()
    {
        $title = 'Update Task';

        return $this->render('form', compact('title'));
    }

    public function update(int $id)
    {
        if (!IS_ADMIN) {
            return redirect('/auth/login');
        }

        $title = 'Update Task';
        $todo = R::load('todo', $id);

        if (!$todo) {
            throw new NotFoundHttpException();
        }

        return $this->render('form', compact('todo', 'title'));
    }

    public function store(int $id = null)
    {
        if ($id && !IS_ADMIN) {
            return redirect('/auth/login');
        }

        SimpleRouter::router()->getCsrfVerifier()->handle(request());

        if (Todo::fromInput($id) !== true) {
            if ($id) {
                return redirect('/todo/update/' . $id);
            } else {
                return redirect('/todo/create');
            }
        }

        return redirect('/');
    }
}
