<?php

namespace Project\Controllers;

use \Core\Controller;

class UserController extends Controller
{
    private $users;

    public function __construct()
    {
        $this->users = [1 => ['name' => 'user1', 'age' => '23', 'salary' => 1000],
            2 => ['name' => 'user2', 'age' => '24', 'salary' => 2000],
            3 => ['name' => 'user3', 'age' => '25', 'salary' => 3000],
            4 => ['name' => 'user4', 'age' => '26', 'salary' => 4000],
            5 => ['name' => 'user5', 'age' => '27', 'salary' => 5000],];
    }

    public function show($param)
    {
        if (isset($param)) {
            var_dump($this->users[$param]);
        }
    }

    public function info($params)
    {
        $id = $params[0];
        $key = $params[1];
        if (isset($params)) {
            print_r($this->users[$id][$key]);
        }
    }

    public function all()
    {
        var_dump($this->users);
    }

    public function first($param)
    {
        for ($i = 1; $i < $param + 1; $i++) {
            var_dump($this->users[$i]);
        }
    }
}