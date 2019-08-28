<?php

class Vehicle {
    public $weight;
    public $color;

    public $distance;

    public function __construct($color, $weight)
    {
        $this->color = $color;
        $this->weight = $weight;
    }

    public function move(float $distance){
        $this->distance += $distance;
    }
}

class Car extends Vehicle {

    private $brand;
    private $fuel;

    public function __construct($color, $weight, $brand)
    {
        $this->brand = $brand;
        parent::__construct($color, $weight);
    }

    public function refuel($liter){
        $this->fuel += $liter;
    }
}

$car = new Car('red', 1200, 'Audi');
$car->move(100);
$car->refuel(100);

var_dump($car);
