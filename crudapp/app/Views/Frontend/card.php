<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/style1.css') ?>">
    <title>Card Payment</title>

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

<!-- 
            <a href="<?= base_url('register') ?>" class="login-btn">Register</a>
            <a href="<?= base_url('login') ?>" class="login-btn">Login</a> -->

        </div>

    </nav>
 <div class="card-container">

    <h2>Card Payment</h2>

    <form action="<?= base_url('card/pay') ?>" method="post">

        <div class="input-group">
            <label>Card Holder Name</label>
            <input type="text" name="card_name" placeholder="John Doe" required   pattern="[A-Za-z ]{3,50}"
                     title="Card holder name should contain only letters and spaces (3-50 characters).">
        </div>

        <div class="input-group">
            <label>Card Number</label>
            <input type="text" name="card_number" maxlength="16" placeholder="1234 5678 9012 3456" required>
        </div>

        <div class="row">

            <div class="input-group">
                <label>Expiry Date</label>
                <input type="month" name="expiry" required>
            </div>

            <div class="input-group">
                <label>CVV</label>
                <input type="password" name="cvv" maxlength="3" placeholder="123" required>
            </div>

        </div>

      <button type="submit" class="pay-btn">
        Pay Now
    </button>

    </form>

</div>
    <!-- Footer -->

    <footer>

        <p>© 2025 FashionHub. All Rights Reserved.</p>

    </footer>

</body>

</html>