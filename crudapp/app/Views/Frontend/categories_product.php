<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/style1.css') ?>">
    <title>Fashion Store</title>

    <link rel="stylesheet" href="css/style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>

    <!-- Navbar -->


    <nav class="navbar">

        <div class="logo">
            Fashion<span>Hub</span>
        </div>

        <ul class="nav-links">

            <li><a href="<?= base_url('home') ?>">Home</a></li>
            <li><a href="<?= base_url('shop') ?>">Shop</a></li>
            <li>  <a href="<?= base_url('category/5') ?>">Men</a></li>
            <li>  <a href="<?= base_url('category/4') ?>">Women</a></li>
           

        </ul>

        <div class="icons">

            <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>

            
            <a href="<?= base_url('customer/dashboard') ?>"><i class="fa-solid fa-user"></i></a>
            

          <?php
            $cart = session()->get('cart') ?? [];
            $count = 0;

            foreach ($cart as $item) {
                $count += $item['qty'];
            }
            ?>

            <div class="cart-icon">
                <a href="<?= base_url('cart') ?>">
                    <i class="fa-solid fa-cart-shopping"></i>

                    <?php if ($count > 0): ?>
                        <span class="cart-badge"><?= $count ?></span>
                    <?php endif; ?>
                </a>
            </div>

<!-- 
                <a href="<?= base_url('register') ?>" class="login-btn">Register</a>
                <a href="<?= base_url('login') ?>" class="login-btn">Login</a> -->


        </div>

    </nav>

<h2 class="category-title"><?= esc($category['name']); ?></h2>

<div class="products-grid">

<?php if (!empty($products)): ?>

    <?php foreach ($products as $product): ?>

        <div class="product-card">

            <div class="product-image">
                <img src="<?= base_url('uploads/products/' . $product['image']) ?>" alt="<?= esc($product['name']) ?>">
            </div>

            <div class="product-info">
                <h3><?= esc($product['name']); ?></h3>
                <p class="price"><?= esc($product['price']); ?></p>

                <a href="<?= base_url('product/' . $product['id']) ?>" class="product-btn">
                    View Product
                </a>
            </div>

        </div>

    <?php endforeach; ?>

<?php else: ?>

    <h3>No products found.</h3>

<?php endif; ?>

</div>
    <!-- Footer -->

    <footer>

        <p>© 2025 FashionHub. All Rights Reserved.</p>

    </footer>

</body>

</html>