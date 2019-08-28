<?php


class Car {
    public $color;
    public $brand;
}

$car1 = new Car();
$car1->color = "Rot";
$car1->brand = "Audi";


$car2 = new Car();
$car2->color = "Weiß";
$car2->brand = "Porsche";

$car3 = new Car();

echo $car1->brand;
echo $car1->color;

print_r($car1);
print_r($car2);
print_r($car3);

var_dump($car1);
var_dump($car2);
var_dump($car3);

