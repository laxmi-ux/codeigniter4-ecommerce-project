<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - FashionHub</title>

    <link rel="stylesheet" href="<?= base_url('css/style1.css') ?>">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>

    <nav class="navbar">

        <div class="logo">
            Fashion<span>Hub</span>
        </div>

        <ul class="nav-links">
            <li><a href="<?= base_url('home') ?>">Home</a></li>
            <li><a href="<?= base_url('shop') ?>">Shop</a></li>
            <li><a href="<?= base_url('category/5') ?>">Men</a></li>
            <li><a href="<?= base_url('category/4') ?>">Women</a></li>
        </ul>

        <div class="icons">
            <a href="<?= base_url('register') ?>" class="login-btn">Register</a>
            <a href="<?= base_url('login') ?>" class="login-btn">Login</a>
        </div>

    </nav>

    <div class="register-container">

        <form action="<?= base_url('login/check') ?>" method="post" class="register-form">

            <h2>Customer Login</h2>

            <?php if (session()->getFlashdata('error')) : ?>
                <p style="color:red"><?= session()->getFlashdata('error') ?></p>
            <?php endif; ?>

            <div class="form-group">
                <label>Email</label>
                <input
                    type="email"
                    name="email"
                    required
                    maxlength="100"
                    placeholder="Enter your email"
                    title="Please enter a valid email address">
            </div>

            <div class="form-group">
                <label>Password</label>
                <input
                    type="password"
                    name="password"
                    required
               
                    placeholder="Enter your password"
                    title="Password must be between 8 and 20 characters">
            </div>

            <button type="submit">Login</button>

            <p style="text-align:center;margin-top:15px;">
                Don't have an account?
                <a href="<?= base_url('register') ?>">Register</a>
            </p>
        </form>

    </div>

    <footer>
        <p>© 2025 FashionHub. All Rights Reserved.</p>
    </footer>

</body>

</html>