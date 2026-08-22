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
            <li> <a href="<?= base_url('category/5') ?>">Men</a></li>
            <li> <a href="<?= base_url('category/4') ?>">Women</a></li>


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


            <!-- <a href="<?= base_url('register') ?>" class="login-btn">Register</a>
            <a href="<?= base_url('login') ?>" class="login-btn">Login</a> -->

        </div>

    </nav>



    <!-- Hero -->

    <section class="hero">

        <div class="hero-content">

            <h1>New Fashion Collection 2025</h1>

            <p>Discover Premium Clothing For Every Season</p>

            <a href="<?= base_url('shop') ?>" class="btn">Shop Now</a>

        </div>

    </section>
    <section class="categories">

        <h2>Shop By Category</h2>

        <div class="category-grid">

            <div class="category-card">
                <a href="<?= base_url('category/5') ?>">
                    <img src="<?= base_url('uploads/frontends/menc.jpeg') ?>" alt="Men">
                    <h3>Men</h3>
                </a>
            </div>

            <div class="category-card">
                <a href="<?= base_url('category/4') ?>">
                    <img src="<?= base_url('uploads/frontends/womenc.jpeg') ?>" alt="Women">
                    <h3>Women</h3>
                </a>
            </div>

            <div class="category-card">
                <a href="<?= base_url('category/6') ?>">
                    <img src="<?= base_url('uploads/frontends/kidsc.jpeg') ?>" alt="Kids">
                    <h3>Kids</h3>
                </a>
            </div>

        </div>

    </section>
    <section class="products">

        <h2>Featured Products</h2>

        <div class="product-grid">

            <?php if (!empty($products)): ?>

                <?php foreach (array_slice($products, 0, 4) as $row): ?>

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
    <!-- Banner -->

    <section class="offer">

        <h2>Summer Sale</h2>

        <p>Up To 50% OFF</p>

        <a href="<?= base_url('shop') ?>" class="btn">Shop Now</a>

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