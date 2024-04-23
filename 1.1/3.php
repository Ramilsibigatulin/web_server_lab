<?php

interface CalculateSquare {
    public function calculateSquare() : float;
}

interface NameClass {
    public function NameClass() : string;
}

class Rectangle implements CalculateSquare, NameClass {
    public function __construct(
        public $x,
        public $y,
        public $nameClass,
    ){}
    public function calculateSquare() : float {
        return $this->x * $this->y;
    }
    public function NameClass() : string {
        return get_class($this);
    }
}

class Square implements CalculateSquare, NameClass {
    public function __construct(
        public $x,
        public $nameClass,
    ){}
    public function calculateSquare() : float {
        return $this->x ** 2;
    }
    public function NameClass() : string {
        return get_class($this);
    }
}

class Circle implements CalculateSquare, NameClass {
    const PI = 3.1416;

    public function __construct(
        public $r,
        public $nameClass,
    ){}
    public function calculateSquare() : float {
        return self::PI * ($this->r**2);
    }
    public function NameClass() : string {
        return get_class($this);
    }
}

$object = [
    $rectangle = new Rectangle(3, 4, 'Rectangle'),
    $square = new Square(4, 'Square'),
    $circle = new Circle(8, 'Circle'),
];

foreach($object as $elem){
    if ($elem instanceof CalculateSquare) {
        echo 'Площадь объекта равна: '.$elem->calculateSquare().'<br>';
        echo 'Эта фигура называется: '.$elem->NameClass().'<br>';
    } else {
        echo 'Объект'.$elem->NameClass().'не реализует данный  интерфейс CalculateSquare<br>';
    }
}

echo ($object[0] instanceof Rectangle) ? 'true' : 'false';