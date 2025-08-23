<?php
require_once "67.php";

class Link extends Tag
{
    const ACTIVE_ATTR = 'active';
    public function __construct()
    {
        parent::__construct("a");
        $this->setAttr("href", "");
    }

    public function open()
    {
        $this->activateSelf(); // вызываем активацию
        return parent::open(); // вызываем метод родителя
    }

    private function activateSelf()
    {
        if ($this->getAttr('href') === $_SERVER['REQUEST_URI']) {
            $this->addClass(self::ACTIVE_ATTR);
        }
    }
}

//echo (new Link())->setText('menu')->setAttr("href", "for task/menu.php")->show() . "<br>";
echo (new Link)
    ->setAttr('href', 'menu.php')
    ->setAttr('class', 'link1 link2') // добавляем ссылке классы
    ->setText('index')
    ->show();