<?php

require 'src/models/categories.php';
require 'src/data/images.php';

$products = [];
$cart = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the product name and price from the request body
    $productName = $_POST['name'];
    $productPrice = $_POST['price'];
  
    // Perform any necessary validation or sanitization on the input data
  
    // Add the product to the cart array
    session_start(); // Start the session (if not already started)
    if (!isset($_SESSION['cart'])) {
      $_SESSION['cart'] = []; // Initialize the cart array
    }
    $_SESSION['cart'][] = [
      'name' => $productName,
      'price' => $productPrice
    ];
  
    // Prepare the response data
    $response = [
      'success' => true,
      'message' => 'Product added to cart successfully',
      'cart' => $_SESSION['cart']
    ];
  
    // Send the response as JSON
    header('Content-Type: application/json');
    echo json_encode($response);
    exit;
  }


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
    
    public function addToCart() {
        global $cart; 
        $productInfo = [
            'name' => $this->productName,
            'price' => $this->productPrice,
        ];
        $cart[] = $productInfo; 
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
    
    public function getImageSrc(): string {
        return $this->productImage;
    }
}

// Create products
// toys
$redDragon = new Product('Red Dragon', 45.0, [$toyCategory], 'redDragon', $toyImages['redDragon']);
$blueDragon = new Product('Blue Dragon', 102.59, [$toyCategory, $popularCategory], 'blueDragon', $toyImages['blueDragon']);
$greenDragon = new Product('Green Dragon', 50.59, [$toyCategory], 'greenDragon', $toyImages['greenDragon']);
$purpleDragon = new Product('Purple Dragon', 100.99, [$toyCategory, $popularCategory], 'purpleDragon', $toyImages['purpleDragon']);

// beauty
$cosmetics = new Product('Cosmo Cosmetics', 25.99, [$beautyCategory, $popularCategory], 'cosmetics', $beautyImages['cosmetics']);
$hairDresser = new Product('Hair Dresser', 109.99, [$beautyCategory, $popularCategory], 'hairDresser', $beautyImages['hairDress']);
$butterflyMakeup = new Product('Butterfly Makeup', 89.99, [$beautyCategory, 'beauty'], 'butterflyMakeup', $beautyImages['butterfly']);
$makeUpKit = new Product('MakeUpKit', 100.99, [$beautyCategory, 'beauty'], 'makeUpKit', $beautyImages['makeUpKit']);

$popularProducts = filtercategory($products, $popularCategory);
$beautyProducts = filtercategory($products, $beautyCategory);
$toyProducts = filtercategory($products, $toyCategory);

function filtercategory(array $products, $category): array {
    $filteredProducts = [];

    foreach ($products as $product) {
        if (in_array($category, $product->getProductCategories())) {
            $filteredProducts[] = $product;
        }
    }

    return $filteredProducts;
}

var_dump($cart);

?>