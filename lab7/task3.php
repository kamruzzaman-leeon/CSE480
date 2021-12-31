<?php

class Student
{
    private $name, $id, $CGPA;

    public function setValue($name, $id, $CGPA)
    {
        $this->name = $name;
        $this->id = $id;
        $this->CGPA = $CGPA;
    }

    public function getCGPA()
    {
        return $this->CGPA;
    }
}


$obj1 = new Student();
$obj1->setValue('Kamruzzaman Leeon', '2018-1-60-252', 3.61);

$obj2 = new Student();
$obj2->setValue('himel', '2018-1-60-151', 3.67);

$avgCGPA = ($obj1->getCGPA() + $obj2->getCGPA()) / 2;

echo "The average CGPA of is: " . $avgCGPA;
