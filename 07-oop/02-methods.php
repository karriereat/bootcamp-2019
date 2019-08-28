<?php


class Car {
    public $color;
    public $brand;

    function drive(int $speed) : string {
        return sprintf("The car is driving with %sKm/h", $speed);
    }
}

$car1 = new Car();
echo $car1->drive(120);


