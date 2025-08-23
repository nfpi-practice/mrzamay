<?php

namespace Modules\Shop\Core;

class Cart
{
    protected $stroke = 'ooooooo';
    public function __construct()
    {
        print_r($this->stroke . "<br>");
    }
}