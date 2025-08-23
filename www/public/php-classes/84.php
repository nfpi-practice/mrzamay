<?php

class Validator
{
    public function isEmail($str)
    {
        return (bool)filter_var($str, FILTER_VALIDATE_EMAIL);
    }

    public function isDomain($str)
    {
        return (bool)filter_var($str, FILTER_VALIDATE_DOMAIN);
    }

    public function inRange($num, $from, $to)
    {
        return ($num >= $from && $num <= $to);
    }

    public function inLength($str, $from, $to)
    {
        return (mb_strlen($str) >= $from && mb_strlen($str) <= $to);
    }
}

$validator = new Validator();
print_r("mail@gmail.com: ");
var_dump($validator->isEmail('mail@gmail.com'));
print_r(" mail@mail: ");
var_dump($validator->isEmail("mail@mail"));

print_r("<br>domain.com: ");
var_dump($validator->isDomain('domain.com'));
print_r(" domain..com: ");
var_dump($validator->isDomain('domain..com'));

print_r("<br>9 in range 1..10: ");
var_dump($validator->inRange(9, 1, 10));
print_r(" 19 in range 1..10: ");
var_dump($validator->inRange(19, 1, 10));

print_r("<br>'Hello!' in range 1..10: ");
var_dump($validator->inLength('Hello!', 1, 10));
print_r(" 'Helloooooooo!' in range 1..10: ");
var_dump($validator->inRange('Helloooooooo!', 1, 10));