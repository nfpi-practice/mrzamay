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
                if ($value === true) {
                    $str .= " $key";
                } else {
                    $str .= " $key='$value'";
                }
            }
        }
        return $str;
    }

    public function setAttr($attr, $value)
    {
        $this->attrs[$attr] = $value;
        return $this;
    }

    public function setAttrs($attrs)
    {
        foreach ($attrs as $key => $value) {
            $this->setAttr($key, $value);
        }
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

print_r((new Tag("input"))->setAttr("name", "name1")->open());
print_r((new Tag("input"))->setAttr("name", "name2")->open());