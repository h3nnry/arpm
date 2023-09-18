<?php

declare(strict_types=1);

class Foo
{
    private string $sHelloString = 'Hello world!';

    /** @var array * */
    public $aArray = [];

    public function printString(): void
    {
        echo $this->helloString;
    }

    public function __toString(): string
    {
        $print = '';

        $properties = get_object_vars($this);

        foreach ($properties as $property) {
            switch (gettype($property)) {
                case 'string':
                case 'integer':
                case 'double':
                    $print .= $property . PHP_EOL;
                    break;
                case 'array':
                    $print .= json_encode($property) . PHP_EOL;
                    break;
                case 'boolean':
                    $print .= $property === true ? 'true' : 'false';
                    $print .= PHP_EOL;
                    break;
            }
        }

        return $print;
    }
}

$foo = new Foo();
echo $foo;

