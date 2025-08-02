<?php
class Tag
{
    private $name;
    public function __construct($name)
    {
        $this->name = $name;
    }
    public function open()
    {
        return "<$this->name>";
    }
    public function close()
    {
        return "</$this->name>";
    }
}
$img = new Tag("img");
$header = new Tag("header");
print_r($img->open() . $img->close());
print_r($header->open() . "header сайта" . $header->close());