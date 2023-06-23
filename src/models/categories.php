<?php

require 'src/data/icons.php';

class Category { 
    private string $categoryName;
    private string $categoryIcon;

    

    public function __construct(string $name, string $icon) {
        $this->categoryName = $name;
        $this->categoryIcon = $icon;
    }

    public function getCategoryName():string {
        return $this->categoryName;
    }
    public function getCategoryIcon():string {
        return $this->categoryIcon;
    }
}

$toyCategory = new Category ("Toys", $icons['toy']);
$beautyCategory = new Category ("Beauty", $icons['beauty']);
$toolsCategory = new Category ("Tools", $icons['tools']);
$popularCategory = new Category('Popular', $icons['popular']);