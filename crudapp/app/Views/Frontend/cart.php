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
            //get cart from session 
            $cart = session()->get('cart') ?? [];
            // Initialize the counter
            $count = 0;

            //Loop through each product
             // The loop runs once for each product.
            foreach ($cart as $item) {
            //    Add the quantity
                $count += $item['qty'];
            }
            ?>
            <!-- // show on the cart  because of css  -->
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

    <h2 class="cart-title">My Shopping Cart</h2>


    <div class="cart-container">

        <div class="cart-items">

            <?php
            $grandTotal = 0;

            // loop 
            foreach ($cart as $item):

                // Price Conversion  : to remove , from price to calculate easily
                $price = (float) str_replace(['₹', ','], '', $item['price']);
                // store in total of price * qty 
                $lineTotal = $price * $item['qty'];
                // add all product price 
                $grandTotal += $lineTotal;
            ?>
                <!-- // show all the details -->
                <div class="cart-card">

                    <div class="cart-image">

                        <img src="<?= base_url('uploads/products/' . $item['image']) ?>">
                    </div>

                    <div class="cart-details">
                        <h3><?= $item['name'] ?></h3>

                        <p><strong>Price:</strong> <?= $item['price'] ?></p>

                        <p><strong>Quantity:</strong> <?= $item['qty'] ?></p>

                        <p><strong>Total:</strong> ₹<?= $lineTotal ?></p>

                        <div class="cart-buttons">
                            <a href="<?= base_url('cart/decrease/' . $item['id']) ?>" class="btn qty-btn">-</a>
                            <span><?= $item['qty'] ?></span>
                            <a href="<?= base_url('cart/increase/' . $item['id']) ?>" class="btn qty-btn">+</a>

                            <a href="<?= base_url('cart/remove/' . $item['id']) ?>" class="btn remove-btn">
                                <i class="fa-solid fa-trash"></i> Remove
                            </a>
                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>


        <div class="cart-summary">

            <h2>Order Summary</h2>
<!-- 
            // item count karega  -->
            <p>Items : <?= count($cart) ?></p>

            <h3>Grand Total</h3>
 
            <h1>₹<?= $grandTotal ?></h1>

            <a href="<?= base_url('checkout') ?>" class="checkout-btn">
                Proceed to Checkout
            </a>

        </div>

    </div>
    <!-- Footer -->

    <footer>

        <p>© 2025 FashionHub. All Rights Reserved.</p>

    </footer>

</body>

</html>