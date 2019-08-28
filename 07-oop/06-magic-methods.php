<?php


class Car {

    function __construct()
    {
        echo "__constructor called \n";
    }

    function __get($key)
    {
        echo "__get called: $key  \n";
    }

    function __set($property, $value)
    {
        echo "__set called: $property : $value  \n";
    }

    function __call($method, $arguments)
    {
        echo "__call called: $method, arguments: " . implode(',', $arguments) . "\n";
    }

    function __clone(){
        echo "__clone called \n";
    }

    function __invoke()
    {
        echo "__invoke called \n";
    }

    function __destruct()
    {
        echo "__destruct called \n";
    }
}

$car = new Car();
echo $car->foo;
$car->foo = 'bar';
$car->drive('foo', 'bar');
$car2 = clone($car);
$car();


