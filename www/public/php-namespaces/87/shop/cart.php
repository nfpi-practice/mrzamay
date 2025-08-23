<?php

namespace Modules\Shop;

class Cart
{
    protected $stroke = "parent";

    public function __construct()
    {
        print_r("|-|_|-| I'm a $this->stroke |-|_|-|<br>");
    }
}