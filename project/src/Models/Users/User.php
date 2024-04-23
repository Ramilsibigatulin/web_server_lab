<?php

namespace src\Models\Users;

    class User{
        public function __construct(
            private $name,
        ){}
        public function getName(){
            return $this->name;
        }
    }