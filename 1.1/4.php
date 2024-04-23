<?php
    class Post{
        public function __construct(
            protected $title, 
            protected $text
        ){}

        public function setTitle(string $title){
            $this->title = $title;
        }
        public function setText(string $text){
            $this->text = $text;
        }
        public function getTitle(){
            return $this->title;
        }
        public function getText(){
            return $this->text;
        }
    }

    class Lesson extends Post{
        public $homeWork;
        public function __construct(string $title,string $text, string $homeWork){
            parent::__construct($title, $text);
            $this->homeWork = $homeWork;
        }
    }

    class PaidLesson extends Lesson{
        protected $price;
        public function __construct(string $title, string $text, string $homeWork, float $price){
            parent::__construct($title, $text, $homeWork);
            $this->price = $price;
        }

        public function setPrice(float $price){
            $this->price = $price;
        }

        public function getPrice(){
            return $this->price;
        }
    }

    $post = new Post('title', 'text');
    $lesson = new Lesson('title', 'text', 'homework');
    echo $lesson->getTitle();
    echo $post->setText('post');

    // Создание объекта класса PaidLesson
    $paidLesson = new PaidLesson('Урок о наследовании в PHP', 'Лол, кек, чебурек', 'Ложитесь спать, утро вечера мудренее', 99.90);

    // Вывод объекта с помощью var_dump()
    var_dump($paidLesson);