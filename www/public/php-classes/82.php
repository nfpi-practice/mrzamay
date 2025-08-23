<?php

class SessionShell
{
    // Удобно стартуем сессию в конструкторе класса:
    public function __construct()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function set($name, $value)
    {
        $_SESSION[$name] = $value;
    }

    public function get($name)
    {
        return $_SESSION[$name];
    }

    public function del($name)
    {
        unset($_SESSION[$name]);
    }

    public function exists($name)
    {
        return isset($_SESSION[$name]);
    }

    public function destroy()
    {
        session_destroy();
    }
}

$session = new SessionShell();
$session->set('test1', '1');
$session->set('test2', '2');
$session->set('test3', '3');
print_r($_SESSION);
$session->del('test2');
print_r($_SESSION);
$session->destroy();