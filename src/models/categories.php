<?php

class Category {
    private string $categoryName;
    private string $categoryIcon;

    public function __construct($name, $icon) {
        $this->categoryName = $name;
        $this->categoryIcon = $icon;
    }
}