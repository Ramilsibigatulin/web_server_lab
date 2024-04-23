<?php
    class Cat{
        private $name;
        private $color;
        public $weigth;

        public function __construct(string $name, string $color, int $weigth ){
            $this->name = $name;
            $this->color = $color;
            $this->weigth = $weigth;

        }   

        public function sayHello(){

            return 'Myau'.'. My color is '.$this->color;
            
        }
        public function setName(string $name){
            $this->name = $name;
        }
        public function getName(): string
        {
            return $this->name;
        }
        public function getColor(): string
        {
            return $this->color;
        }
    }

    $cat = new Cat('Barsik', 'orange',7);
    // $cat->setName('Murka');
    // $cat->color = 'black';
    // echo $cat->getName();
    echo $cat->sayHello();
    // $cat1 = new Cat;
    // var_dump($cat);