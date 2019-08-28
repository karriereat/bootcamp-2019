<?php

class Vehicle {
    private $distance;

    public function move(float $distance){
        $this->addDistance($distance);
    }

    protected function addDistance($distance){
        $distance = abs($distance);
        $this->distance += $distance;
    }
}

class Car extends Vehicle {

    public function move(float $distance){
        if($distance < 0){
            $distance = 0;
        }
        $this->addDistance($distance);
    }
}

$car = new Car();
$car->move(100);

//Not Allowed
//echo $car->distance;

var_dump($car);
