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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <link rel="stylesheet" href="./style.css">
    <title>Document</title>
</head>
<body class="bg-lights">
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
                        <?php foreach ($popularProducts as $product): ?>
                        <div class="col-3">
                            <div class="card">
                                <div class="card-body p-0">
                                    <img class="rounded-top" src="<?= $product->getImageSrc() ?>">
                                </div>
                                <div class="card-footer">
                                    <div class="container px-0 d-flex justify-content-between">
                                        <span class="product--name"><?= $product->getProductName() ?></span>
                                        <span class="price"><?= $product->getProductPrice() ?>$</span>
                                    </div>
                                    <div class="container p-0 py-2">
                                        <?php foreach ($product->getProductCategories() as $category): ?>
                                            <span class="badge bg-danger"><?= $category->getCategoryName() ?></span>
                                        <?php endforeach; ?>
                                    </div>
                                    <div class="container cart px-0">
                                    <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample" aria-controls="offcanvasExample" onclick="addToCart('<?= $product->getProductName() ?>', <?= $product->getProductPrice() ?>)">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                    </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        </section>
        <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
            <div class="offcanvas-header">
                <h3 class="offcanvas-title" id="offcanvasExampleLabel">CARRELLO</h3>
                <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                <ul class="list">
                    <?php foreach ($cart as $item): ?>
                        <li class="list-group-item"><?= $item['name'] ?> - <?= $item['price'] ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </div>    
    </main>
    <script>
  function addToCart(productName, productPrice) {
    var data = {
      name: productName,
      price: productPrice
    };

    axios.post('product.php', data)
      .then(function (response) {
        alert(response.data.message);
        console.log(response.data.cart);
      })
      .catch(function (error) {
        console.error(error);
      });
  }
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>
</html>