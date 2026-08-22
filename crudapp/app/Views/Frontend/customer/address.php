

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



    <div class="customer-dashboard">

        <div class="sidebar">
            <h2>My Account</h2>

            <a href="<?= base_url('customer/dashboard') ?>">🏠 Dashboard</a>

            <a href="<?= base_url('customer/orders') ?>">📦 My Orders</a>

            <a href="<?= base_url('customer/profile') ?>">👤 My Profile</a>

            <a href="<?= base_url('customer/address') ?>">📍 Address Book</a>
            

            <a href="<?= base_url('customer/change_password') ?>">🔒 Change Password</a>

            <a href="<?= base_url('logout') ?>">🚪 Logout</a>
        </div>

        <div class="adddress-content">

<h2>Address Book</h2>

<a href="<?= base_url('customer/add-address') ?>" class="btn">
    + Add New Address
</a>

<?php foreach($addresses as $address): ?>

<div class="address-card">

    <h3><?= esc($address['full_name']) ?></h3>

    <p><?= esc($address['address']) ?></p>

    <p>
        <?= esc($address['city']) ?>,
        <?= esc($address['state']) ?> -
        <?= esc($address['pincode']) ?>
    </p>

    <p><?= esc($address['phone']) ?></p>


    <a href="<?= base_url('customer/edit-address/'.$address['id']) ?>">
        Edit
    </a>

</div>

<?php endforeach; ?>



        </div>
</body>

</html>