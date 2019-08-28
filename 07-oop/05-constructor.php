<?php


class Car {
    public $color;
    public $fuel;
    public $consumtion;

    public function __construct(string $color, float $consumtion)
    {
        $this->color = $color;
        $this->consumtion = $consumtion;
    }
}

$car = new Car('Red', 0.055);

print_r($car);



