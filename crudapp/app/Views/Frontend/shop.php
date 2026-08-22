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


   

    <section class="products">

        <h2>Featured Products</h2>

        <div class="product-grid">

            <?php if (!empty($products)): ?>

                <?php foreach ($products as $row): ?>

                    <div class="product-card">

                            <img src="<?= base_url('uploads/products/' . $row['image']) ?>" alt="<?= esc($row['name']) ?>">

                        <h3><?= esc($row['name']) ?></h3>

                        <h4><?= esc($row['price']) ?></h4>

                        <a href="<?= base_url('product/' . $row['id']) ?>" class="product-btn">
                            View Product
                        </a>

                    </div>

                <?php endforeach; ?>

            <?php else: ?>

                <p>No Products Found.</p>

            <?php endif; ?>

        </div>

    </section>
  
    <!-- Services -->

    <section class="services">

        <div class="service">
            <i class="fa-solid fa-truck-fast"></i>
            <h3>Free Shipping</h3>
        </div>

        <div class="service">
            <i class="fa-solid fa-credit-card"></i>
            <h3>Secure Payment</h3>
        </div>

        <div class="service">
            <i class="fa-solid fa-rotate-left"></i>
            <h3>Easy Returns</h3>
        </div>

        <div class="service">
            <i class="fa-solid fa-headset"></i>
            <h3>24/7 Support</h3>
        </div>

    </section>

    <!-- Footer -->

    <footer>

        <p>© 2025 FashionHub. All Rights Reserved.</p>

    </footer>

</body>

</html>