<?php
class User {
    private $name;
    private $surname;
    private $patronymic;
    public function __construct($name, $surname, $patronymic)
    {
        $this->name = $name;
        $this->surname = $surname;
        $this->patronymic = $patronymic;
    }
    public function __toString()
    {
        return $this->surname . ' ' . $this->name . ' ' . $this->patronymic;
    }
}
$user = new User('Ivan', 'Ivanov', 'Ivanovich');
echo $user;

class Arr {
    private $numbers = [];
    public function add($number)
    {
        $this->numbers[] = $number;
        return $this;
    }
    public function __toString()
    {
        return (string) array_sum($this->numbers);
    }
}
$arr = (new Arr)->add(6)->add(7)->add(3);
echo "<br>" . $arr;