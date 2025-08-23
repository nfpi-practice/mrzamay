<?php
require_once "classes.php";

class Select extends Tag
{
    public $elements = [];

    public function __construct()
    {
        parent::__construct("select");
    }

    public function add($text)
    {
        $this->elements[] = $text;
        parent::setText($this->getText() . $text);
        return $this;
    }

    public function open()
    {
        $attrName = $this->getAttr("name");

        if ($attrName) {
            if (isset($_REQUEST["$attrName"])) {
                foreach ($this->elements as $element) {
                    $element->removeAttr("selected");
                    if ($element->getText() === $_REQUEST["$attrName"]) {
                        $element->setSelected();
                    }
                }
            }
            $this->setText(implode('', $this->elements));
        }
        return parent::open();
    }
}

class Option extends Tag
{
    public function __construct()
    {
        parent::__construct("option");
    }

    public function __toString()
    {
        return $this->show();
    }

    public function setSelected()
    {
        $this->setAttr("selected");
        return $this;
    }
}

$form = (new Form)->setAttrs([
    'action' => '',
    'method' => 'GET'
]);

echo $form->open();
echo (new Select)->setAttr('name', 'list')
    ->add((new Option())->setText('item1'))
    ->add((new Option())->setText('item2'))
    ->add((new Option())->setText('item3'))
    ->show();
echo (new Select)->setAttr('name', 'list2')
    ->add((new Option())->setText('item1'))
    ->add((new Option())->setText('item2'))
    ->add((new Option())->setText('item3'))
    ->show();
echo new Submit;
echo $form->close();