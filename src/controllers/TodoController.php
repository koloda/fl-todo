<?php

namespace app\controllers;

use app\models\Todo;
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

        return $this->render('list', compact('todos', 'next', 'prev', 'sortings'));
    }

    public function create()
    {
        /** @var \app\models\Todo $todo */
        $todo = R::dispense('todo');
        $todo->author = 'akoloda';
        $todo->email = 'akoloda@sdf.ff';
        $todo->title = 'ss  sdjf sidoufsdufh lskdfhlksjdhf ksldfh skdfhslkdfhdfsdf ser ter';
        $todo->done = 0;
        $todo->updated = 0;

        var_dump(R::store($todo));

    }

    public function update(int $id)
    {
        $todo = new Todo;
        Todo::fromInput(request()->getInputHandler(), $todo);
    }
}
