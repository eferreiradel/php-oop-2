<?php

class Product  {
    private string $productName;
    private float $productPrice;
    private array $productCategories;

    public function __construct(string $name, float $price, array $categories) {
        $this->productName = $name;
        $this->productPrice = $price;
        $this->productCategories = $categories;
    }

    public function getProductName() {
        return $this->productName;
    }
    public function getProductPrice() {
        return $this->productPrice;
    }
    public function getProductCategories() {
        return $this->productCategories;
    }

}