<?php
class TextInput {
    protected $value = '';

    public function add($text) {
        $this->value .= $text;
    }

    public function getValue() {
        return $this->value;
    }
}

class NumericInput extends TextInput {
    public function add($text) {
        if (is_numeric($text)) {
            parent::add($text);
        }
    }
}
$textInput = new TextInput();
$textInput->add('Hello ');
$textInput->add('World!');
echo $textInput->getValue(); // Wyświetli: Hello World!

$numericInput = new NumericInput();
$numericInput->add('123');
$numericInput->add('abc');
$numericInput->add('456');
echo $numericInput->getValue(); // Wyświetli: 123456
