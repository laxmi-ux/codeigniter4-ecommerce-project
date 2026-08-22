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


            <a href="<?= base_url('cart') ?>"><i class="fa-solid fa-cart-shopping"></i></a>

            <a href="<?= base_url('register') ?>" class="login-btn">Register</a>
            <a href="<?= base_url('login') ?>" class="login-btn">Login</a>

        </div>

    </nav>

    <div class="register-container">

        <form action="<?= base_url('register/store') ?>" method="post" class="register-form">

            <h2>Create Your Account</h2>

            <div class="form-grid">
                <div class="form-group">
                    <label>First Name</label>
                    <input type="text"
                        name="first_name"
                        required
                        pattern="[A-Za-z ]{2,30}"
                        title="First name should contain only letters and spaces (2-30 characters).">
                </div>

                <div class="form-group">
                    <label>Last Name</label>
                    <input type="text"
                        name="last_name"
                        required
                        pattern="[A-Za-z ]{2,30}"
                        title="Last name should contain only letters and spaces (2-30 characters).">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email"
                        name="email"
                        required
                        maxlength="100"
                        title="Enter a valid email address.">
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input type="tel"
                        name="phone"
                        required
                        pattern="[0-9]{10}"
                        maxlength="10"
                        title="Phone number must contain exactly 10 digits.">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password"
                        name="password"
                        required
                        minlength="8"
                        maxlength="20"
                        pattern="(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&]).{8,}"
                        title="Password must contain at least 8 characters, one uppercase letter, one lowercase letter, one number and one special character.">
                </div>

                <div class="form-group">
                    <label>Date of Birth</label>
                    <input type="date"
                        name="date_of_birth"
                        required
                        max="<?= date('Y-m-d') ?>">
                </div>
                <div class="form-group full-width">
                    <label>Gender</label>

                    <div class="gender-group">
                        <label><input type="radio" name="gender" value="Male" required> Male</label>
                        <label><input type="radio" name="gender" value="Female"> Female</label>
                        <label><input type="radio" name="gender" value="Other"> Other</label>
                    </div>
                </div>

                <div class="form-group full-width">
                    <label>Address</label>
                    <textarea name="address"
                        rows="3"
                        required
                        minlength="10"
                        maxlength="200"></textarea>
                </div>
                <div class="form-group">
                    <label>City</label>
                    <input type="text"
                        name="city"
                        required
                        pattern="[A-Za-z ]{2,50}"
                        title="City should contain only letters and spaces.">
                </div>

                <div class="form-group">
                    <label>State</label>
                    <input type="text"
                        name="state"
                        required
                        pattern="[A-Za-z ]{2,50}"
                        title="State should contain only letters and spaces.">
                </div>
                <div class="form-group">
                    <label>Pincode</label>
                    <input type="text"
                        name="pincode"
                        required
                        pattern="[0-9]{6}"
                        maxlength="6"
                        title="Pincode must contain exactly 6 digits.">
                </div>
                <div class="form-group">
                    <label>Country</label>
                    <input type="text"
                        name="country"
                        required
                        pattern="[A-Za-z ]{2,50}"
                        title="Country should contain only letters and spaces.">
                </div>

            </div>

            <button type="submit">Create Account</button>

        </form>

    </div>
    <!-- Footer -->

    <footer>

        <p>© 2025 FashionHub. All Rights Reserved.</p>

    </footer>

</body>

</html>