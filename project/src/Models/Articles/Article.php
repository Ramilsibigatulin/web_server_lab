<?php

namespace src\Models\Articles;
use src\Models\Users\User;

    class Article{
        public function __construct(
            private $title,
            private $text,
            private User $author
        ){}
        public function getTitle(){
            return $this->title;
        }
        public function getText(){
            return $this->text;
        }
        public function getAuthor(): User
        {
            return $this->author;
        }
    }