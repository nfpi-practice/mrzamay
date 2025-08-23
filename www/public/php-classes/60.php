<?php

class Tag
{
    private $name;
    private $attrs;

    public function __construct($name, $attrs = [])
    {
        $this->name = $name;
        $this->attrs = $attrs;
    }

    public function getAttrsStr()
    {
        $str = "";
        if (!empty($this->attrs)) {
            foreach ($this->attrs as $key => $value) {
                $str .= "$key='$value'";
            }
        }
        return $str;
    }

    public function open()
    {
        return "<$this->name {$this->getAttrsStr()}>";
    }

    public function close()
    {
        return "</$this->name>";
    }
}

$tag = new Tag("font", ["color" => "red", "size" => "4"]);
print_r($tag->open() . "TEXT" . $tag->close());