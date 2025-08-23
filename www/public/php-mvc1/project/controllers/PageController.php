<?php

namespace Project\Controllers;

use \Core\Controller;
use \Project\Models\Page;
use \Project\Models\Pages;

class PageController extends Controller
{
    private $pages;

    public function __construct()
    {
        $this->pages = [
            1 => ['title' => 'страница 1', 'text' => 'текст страницы 1'],
            2 => ['title' => 'страница 2', 'text' => 'текст страницы 2'],
            3 => ['title' => 'страница 3', 'text' => 'текст страницы 3'],
        ];
    }

    public function act()
    {
        $this->title = 'Действие act контроллера page';
        return $this->render('page/act', [
            'header' => 'список юзеров',
            'users' => ['user1', 'user2', 'user3'],
        ]);
    }

    public function show($params)
    {
        $this->title = $this->pages[$params['n']]['title'];
        return $this->render('page/show', ['text' => $this->pages[$params['n']]['text']]);
    }

    public function one($params)
    {
        $page = (new Pages) -> getById($params['id']);

        $this->title = $page['title'];
        return $this->render('page/one', [
            'text' => $page['text'],
            'h1' => $this->title
        ]);
    }

    public function all()
    {
        $this->title = 'Список всех страниц';

        $pages = (new Pages) -> getAll();
        return $this->render('page/all', [
            'pages' => $pages,
            'h1' => $this->title
        ]);
    }

    public function test()
    {
        $page = new Page; // создаем объект модели

        $data = $page->getById(3); // получим запись с id=3
        var_dump($data);

        $data = $page->getById(5); // получим запись с id=5
        var_dump($data);

        $data = $page->getByRange(2, 5); // записи с id от 2 до 5
        var_dump($data);
    }
}