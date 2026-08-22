<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/style1.css') ?>">
    <title>Customer Dashboard</title>

    <link rel="stylesheet" href="css/style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>


<body>

    <!-- Navbar -->




    <div class="customer-layout">

        <!-- Sidebar -->
        <div class="sidebar">
        <h2>My Account</h2>

        <a href="<?= base_url('customer/dashboard') ?>">🏠 Dashboard</a>

        <a href="<?= base_url('customer/orders') ?>">📦 My Orders</a>

        <a href="<?= base_url('customer/profile') ?>">👤 My Profile</a>

        <a href="<?= base_url('customer/address') ?>">📍 Address Book</a>

        

        <a href="<?= base_url('customer/change_password') ?>">🔒 Change Password</a>

        <a href="<?= base_url('logout') ?>">🚪 Logout</a>
    </div>

        <!-- Content -->
        <div class="content-area">

            <div class="edit-container">

                <h2>Edit Profile</h2>
                <form action="<?= base_url('customer/update-profile') ?>" method="post">

                    <div class="form-grid">

                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" value="<?= esc($customer['first_name']) ?>">
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" value="<?= esc($customer['last_name']) ?>">
                        </div>

                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="<?= esc($customer['email']) ?>">
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" value="<?= esc($customer['phone']) ?>">
                        </div>

                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" value="<?= esc($customer['city']) ?>">
                        </div>

                        <div class="form-group">
                            <label>Pincode</label>
                            <input type="text" name="pincode" value="<?= esc($customer['pincode']) ?>">
                        </div>

                        <div class="form-group">
                            <label>State</label>
                            <input type="text" name="state" value="<?= esc($customer['state']) ?>">
                        </div>

                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="country" value="<?= esc($customer['country']) ?>">
                        </div>

                    </div>

                    <div class="form-group full-width">
                        <label>Address</label>
                        <textarea name="address"><?= esc($customer['address']) ?></textarea>
                    </div>

                    <button type="submit">Update Profile</button>

                </form>

            </div>

        </div>

    </div>
</body>

</html>