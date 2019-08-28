<?php


class Car {
    private $fuel;
    private $consumtion;

    private $km = 0;

    public function __construct($consumtion = 0.055)
    {
        $this->consumtion = $consumtion;
    }

    public function refuel(float $liters){
        $this->fuel += $liters;
    }

    public function drive(float $km) {
        $consumption = $km * $this->consumtion;
        $this->consume($consumption);

        $this->km += $km;
    }

    private function consume($liters){
        $this->fuel -= $liters;

        if($this->fuel < 0){
            $this->fuel = 0;
        }
    }

    public function getFuel() : float {
        return $this->fuel;
    }

    public function getKm() : float {
        return $this->km;
    }

}

$car = new Car();
$car->refuel(100);

print_r($car);

$car->drive(10);
$car->drive(250);

print_r($car);

echo $car->getkm();

echo $car->fuel;


