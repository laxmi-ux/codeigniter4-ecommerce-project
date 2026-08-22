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





        <div class="edit-adddress-content">


            <form method="post" action="<?= base_url('customer/update-address/' . $address['id']) ?>">

            
            <h2>Edit Address</h2>

<h4>Full Name:</h4>
                <input type="text" name="full_name"
                    value="<?= esc($address['full_name']) ?>">
                    <h4>Address:</h4>
                <textarea name="address"><?= esc($address['address']) ?></textarea>
                <h4>City:</h4>
                <input type="text" name="city" value=" <?= esc($address['city']) ?>">
                <h4>State:</h4>
                <input type="text" name="state" value="<?= esc($address['state']) ?>">
                <h4>Pincode:</h4>
                <input type="text" name="pincode" value="<?= esc($address['pincode']) ?>">
                <h4>Country:</h4>
                <input type="text" name="country" value="<?= esc($address['country']) ?>">



                <button type="submit">Update Address</button>

            </form>






        </div>
</body>

</html>