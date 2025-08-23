<?php

class Tag
{
    private $name;
    private $attrs = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getAttrsStr()
    {
        $str = "";
        if (!empty($this->attrs)) {
            foreach ($this->attrs as $key => $value) {
                $str .= " $key='$value'";
            }
        }
        return $str;
    }

    public function setAttrs($attr, $value)
    {
        $this->attrs[$attr] = $value;
        return $this;
    }

    public function open()
    {
        return "<$this->name{$this->getAttrsStr()}>";
    }

    public function close()
    {
        return "</$this->name>";
    }

    public function removeAttr($attr)
    {
        unset($this->attrs[$attr]);
        return $this;
    }
}

$tag = new Tag("font");
print_r($tag->setAttrs("size", "12px")->setAttrs("color", "red")
        ->setAttrs("id", "fontId")->removeAttr("id")
        ->open() . "HELLO" . $tag->close());