<?php
class Rectangle{
    private $Width,$Height;
    
    public function setWidth($w)
    {
        $this->Width=$w;
    }

    public function setHeight($h)
    {
        $this->Height=$h;
    }

    public function getWidth()
    {
        return $this->Width;
    }
    public function getHeight()
    {
        return $this->Height;
    }

    public function showArea()
    {
        $area=$this->Height * $this->Width;
        echo "</br> The area of each rectangle is ". $area.'</br>';
    }

}

$object = new Rectangle();
$object->setHeight(5);
$object->setWidth(12);
echo "Width: ".$object->getWidth(). " & "."Height: ".$object->getHeight();
$object->showArea();

echo "</br>";

$object2 =new Rectangle();
$object2->setHeight(10);
$object2->setWidth(10);
echo "Width: ".$object2->getWidth(). " & "."Height: ".$object2->getHeight();
$object2->showArea();

echo "</br>";

class RectangleConstruct
{
    private $Width,$Height;

    public function __construct($w, $h)
    {
        $this->Width = $w;
        $this->Height = $h;
    }

    public function showArea()
    {
        $area = $this->Width * $this->Height;
        echo " Area is: " . $area;
    }
}

$object3 = new RectangleConstruct(7, 8);
echo " Using Constructor for rectangle: ";
$object3->showArea();
