<?php

class Car {
    public $color;
    public $brand;
}

// Comparing Classes

$car1 = new Car();
$car1->color = "Rot";
$car1->brand = "Audi";

$car2 = new Car();
$car2->color = "Rot";
$car2->brand = "Audi";

var_dump($car1 == $car2);
var_dump($car1 === $car2);

// Copy by value vs. copy by reference

$foo = 1;
$bar = $foo;
$foo = 2;

echo "foo: " . $foo . "\n" . "bar: " . $bar . "\n" ;


$car2 = $car1;

$car1->brand = "Porsche";

var_dump($car1);
var_dump($car2);

$car2 = clone($car1);
$car1->brand = "Opel";

var_dump($car1);
var_dump($car2);

