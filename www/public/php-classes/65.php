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

echo (new Tag('input'))->addClass('eee')->open();
echo (new Tag('input'))->addClass('eee')->addClass('bbb')->open();
echo (new Tag('input'))
    ->setAttr('class', 'eee bbb')
    ->addClass('kkk')->open();
echo (new Tag('input'))
    ->setAttr('class', 'eee bbb')
    ->addClass('eee') // такой класс уже есть и не добавится
    ->open();
echo (new Tag('input'))
    ->addClass('eee')
    ->addClass('bbb')
    ->addClass('eee') // такой класс уже есть и не добавится
    ->open();
echo (new Tag('input'))
    ->setAttr('class', 'eee zzz kkk') // добавим 3 класса
    ->removeClass('zzz') // удалим класс 'zzz'
    ->open(); // выведет <input class="eee kkk">