<?php
require 'src/models/product.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://kit.fontawesome.com/52ae8a07c2.js" crossorigin="anonymous"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body>
    <header>
        <div class="navbar bg-primary text-white shadow">
            <div class="container">
                <div class="navbar-brand text-white">
                    Your Store
                </div>
            </div>
        </div>
    </header>
    <main>
        <section>
            <div class="container-fluid">
                <div class="container">
                    <div class="row pb-5">
                        <div class="container py-2">
                            <h3>
                                Popular
                            </h3>
                        </div>
                    <?php foreach ($products as $product): ?>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body p-0">
                                    <img class="rounded-top" src="<?= $product->getImageSrc() ?>">
                                </div>
                                <div class="card-footer">
                                    <div class="container px-0 d-flex justify-content-between">
                                        <span class="productName"><?= $product->getProductName() ?></span>
                                        <span class="price"><?= $product->getProductPrice() ?>$</span>
                                    </div>
                                    <?php foreach ($product->getProductCategories() as $category): ?>
                                        <span class="badge bg-danger"><?= $category->getCategoryName() ?></span>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>