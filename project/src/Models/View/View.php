<?php

namespace src\View;

class View {
    private $pathTemplate;

    public function __construct(string $pathTemplate) {
        $this->pathTemplate = $pathTemplate;
    }

    public function renderHtml(string $templateName, array $var = []) {
        $var['title'] = $var['title'] ?? "Мой блог";
        extract($var);
        include($this->pathTemplate . $templateName);
    }
}