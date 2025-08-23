<?php

class TagHelper
{
    public function open($tagName, $attrs = [])
    {
        $str = $this->getAttrsStr($attrs);
        return "<$tagName$str>";
    }

    public function close($tagName)
    {
        return "</$tagName>";
    }

    public function show($tagName, $text)
    {
        return "<$tagName>$text</$tagName>";
    }

    public function getAttrsStr($attrs)
    {
        $str = "";
        if (!empty($attrs)) {
            foreach ($attrs as $name => $value) {
                if ($value === true) {
                    $str .= " $name";
                } else {
                    $str .= " $name=\"$value\"";
                }
            }
        }
        return $str;
    }
}

$th = new TagHelper();

echo $th->open('form', ['action' => 'test.php', 'method' => 'GET']);
echo $th->open('input', ['name' => 'year']);
echo $th->open('input', ['type' => 'submit']);
echo $th->close('form');