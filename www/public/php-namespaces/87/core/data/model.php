<?php

namespace Core\Data;

class Model
{
    protected $array = [1, 2, 3, 4, 5, 6, 7, 8, 9];

    public function __construct()
    {
        print_r(implode(", ", array_reverse($this->array)) . "<br>");
    }
}