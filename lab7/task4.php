<?php

class Circle
{
    private $radius;
    const PI = 3.1416;
    public function setRadius($r){
        $this->radius=$r;
    }

    public function circumference()
    {
        $Circumferece= 2 * Circle::PI * $this->radius;
        return $Circumferece;
    }
    public function area()
    {
        $Area= Circle::PI * pow($this->radius,2);
        return $Area;   
    }
}

$object= new Circle();
$object->setRadius(5);
echo "</br>The circumferece is: ". $object->circumference()."</br>The  area is: ".$object->area();