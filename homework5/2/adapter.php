<?php

interface ISquare
{
    function squareArea(int $sideSquare);
}

interface ICircle
{
    function circleArea(int $circumference);
}

// Библиотеки

class CircleAreaLib
{
    public function getCircleArea(int $diagonal)
    {
        $area = (M_PI * $diagonal**2) / 4;

       return $area;
   }
}

class SquareAreaLib
{
    public function getSquareArea(int $diagonal)
    {
        $area = ($diagonal**2)/2;

        return $area;
    }
}

// Адаптеры

class AdapterSquare implements ISquare
{
    private $libSquare;

    public function __construct(SquareAreaLib $libSquare)
    {

        $this->libSquare = $libSquare;
    }

    public function squareArea($diagonal)
    {

        return $this->libSquare->getSquareArea($diagonal);
    }
}

class AdapterCircle implements ICircle
{
    private $libCircle;

    public function __construct(CircleAreaLib $libCircle)
    {

        $this->libCircle = $libCircle;
    }

    public function circleArea($diagonal)
    {

        return $this->libCircle->getCircleArea($diagonal);
    }
}

// Клиентский код

function clientCodeSquare(int $diagonal)
{
    $square = new SquareAreaLib();
    $square = new AdapterSquare($square);
    echo $square->squareArea($diagonal);
}

function clientCodeCircle(int $diagonal)
{
    $circle = new CircleAreaLib();
    $circle = new Adaptercircle($circle);
    echo $circle->circleArea($diagonal);
}

clientCodeSquare(2);
echo "\n";
clientCodeCircle(2);
