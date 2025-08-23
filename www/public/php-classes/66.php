<?php


class Tag
{
    private $name;
    private $text;
    private $attrs = [];

    public function __construct($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getText()
    {
        return $this->text;
    }

    public function setText($text)
    {
        $this->text = $text;
    }

    public function getAttrs()
    {
        return $this->attrs;
    }

    public function getAttr($attr)
    {
        return $this->attrs[$attr] ? $this->attrs[$attr] : null;
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

    public function addClass($className)
    {
        if (isset($this->attrs["class"])) {
            $classNames = explode(' ', $this->attrs['class']);
            if (!in_array($className, $classNames)) {
                $classNames[] = $className;
                $this->attrs["class"] = implode(' ', $classNames);
            }
        } else {
            $this->attrs["class"] = $className;
        }
        return $this;
    }

    public function removeClass($className)
    {
        if (isset($this->attrs["class"])) {
            $classNames = $this->removeElem($className, explode(' ', $this->attrs['class']));
            $this->attrs["class"] = implode(' ', $classNames);
        }
        return $this;
    }

    private function removeElem($elem, $arr)
    {
        $key = array_search($elem, $arr);
        if ($key !== false) {
            unset($arr[$key]);
        }
        return $arr;
    }
}

$tag = new Tag("font");
$tag->setText("Hello World");
$tag->setAttrs(["id" => "hello", "class" => "world"]);
print_r("Tag name: " . $tag->getName() . "<br>Tag text: " . $tag->getText() . "<br>Tag Attrs: " . implode(", ", $tag->getAttrs()) .
    "<br>Tag class by ID: " . $tag->getAttr("id"));