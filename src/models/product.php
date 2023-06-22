<?php

require 'src/models/categories.php';
require 'src/data/images.php';

$products = [];
class Product {
    private string $productID;
    private string $productImage;
    private string $productName;
    private float $productPrice;
    private array $productCategories;

    public function __construct(string $name, float $price, array $categories, string $id, string $imgSrc) {
        $this->productName = $name;
        $this->productPrice = $price;
        $this->productCategories = $categories;
        $this->productID = $id;
        $this->productImage = $imgSrc;
        global $products;
        $products[] = $this;
    }

    public function getProductName(): string {
        return $this->productName;
    }

    public function getProductPrice(): float {
        return $this->productPrice;
    }

    public function getProductCategories(): array {
        return $this->productCategories;
    }
    public function getImageSrc() {
        return $this->productImage;
    }
}


$redDragon = new Product('Red Dragon', 45.0, [$toyCategory], 'redDragon', $toyImages['redDragon']);
$blueDragon = new Product('Blue Dragon', 102.59, [$toyCategory],'blueDragon',$toyImages['blueDragon']);
$greenDragon = new Product('Blue Dragon', 50.59, [$toyCategory],'greenDragon',$toyImages['greenDragon']);
$purpleDragon = new Product('Purple Dragon', 100.99, [$toyCategory],'purpleDragon',$toyImages['purpleDragon']);

