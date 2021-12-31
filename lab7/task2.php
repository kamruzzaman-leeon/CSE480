<?php

class Calculator
{
    private $myvalue;
    public function setValue($double)
    {
        $this->myvalue = $double;
    }

    public function square()
    {
        $result = pow($this->myvalue, 2);
        return $result;
    }

    public function qube()
    {
        $result = pow($this->myvalue, 3);
        return $result;
    }
}

$obj = new Calculator();
$obj->setValue(2);
echo "The Square is: " . $obj->square() . " </br> The Qube is: " . $obj->qube();

class CalculatorConstruct
{
    private $myvalue;
    public function __construct($value)
    {
        $this->myvalue = $value;
    }
    public function square()
    {
        $result = pow($this->myvalue, 2);
        return $result;
    }

    public function qube()
    {
        $result = pow($this->myvalue, 3);
        return $result;
    }
}

$obj1 = new CalculatorConstruct(10);

echo "</br>The Square is: " . $obj1->square() . " </br> The Qube is: " . $obj1->qube();

