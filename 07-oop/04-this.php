<?php


class Car {
    public $fuel;
    public $consumtion = 0.055;

    public $km = 0;

    function refuel(float $liters){
        $this->fuel += $liters;
    }

    function drive(float $km) {
        $consumption = $km * $this->consumtion;
        $this->fuel -= $consumption;

        if($this->fuel < 0){
            $this->fuel = 0;
        }

        $this->km += $km;
    }
}

$car = new Car();
$car->refuel(100);

print_r($car);

$car->drive(10);
$car->drive(250);

print_r($car);




