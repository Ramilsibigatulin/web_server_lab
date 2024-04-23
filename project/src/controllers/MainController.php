<?php

namespace src\Controllers;
use src\View\View;

class MainController {
    public $view;

    public function __construct() {
        $this->view = new View('../templates/');
    }

    public function main() {
        $articles = [
            ['title' => 'Мой блог', 'text' => 'new text'],
            ['title' => 'Мой блог', 'text' => 'new text']
        ];
        $this->view->renderHtml('templates/articles/index.php', ['articles' => $articles, 'title' => 'Мой блог']);
    }

    public function sayHello(string $name) {
        $this->view->renderHtml('main/hello.php', ['name' => $name, 'title' => 'Страница приветствия']);
    }

    public function sayBye(string $name) {
        $this->view->renderHtml('main/bye.php', ['name' => $name, 'title' => 'Мой блог']);
    }
}
