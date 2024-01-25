<?php
class Person 
{
    public $name = "asdq";

}

class Work extends Person{
    public $parentObj;

    public function getName($obj){
        $this->parentObj = $obj;
        echo $this->parentObj->name;
    }
}

$person = new Person();
$work =  new Work();
$work->getName($person);



?>