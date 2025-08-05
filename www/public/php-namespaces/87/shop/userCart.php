<?php

namespace Modules\Shop;

class UserCart extends Cart
{
    public function __construct()
    {
        $this->stroke = "child";
        parent::__construct();
    }
}