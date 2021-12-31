<?php
class Box
{
    private $lenght,$Width,$Height;
    public function __construct($l,$w,$h)
    {
        $this->lenght=$l;
        $this->Width=$w;
        $this->Height=$h;
    }
    public function getArea()
    {
        return  $this->lenght * $this->Width * $this->Height;
    }
}

$object =new Box(1,2,3);
echo "The Box are is : ".$object->getArea();