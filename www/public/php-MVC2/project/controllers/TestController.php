<?php

namespace Project\Controllers;

use \Core\Controller;

class TestController extends Controller
{
    public function test()
    {
        echo 'test';
    }

    public function test2()
    {
        return $this->render('test/test2', ['value'=>"test"]);
    }
}