<?php

class Car {
    public $id;
    public static $currentId = 0;

    public function __construct()
    {
        self::$currentId++;
        $this->id = self::$currentId;
    }
}


var_dump(Car::$currentId);

$car1 = new Car();
$car2 = new Car();

var_dump(Car::$currentId);

var_dump($car1);
var_dump($car2);
