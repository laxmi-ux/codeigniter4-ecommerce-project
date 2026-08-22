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
            

            <!-- <a href="<?= base_url('wishlist') ?>">❤️ Wishlist</a> -->

            <a href="<?= base_url('customer/change_password') ?>">🔒 Change Password</a>

            <a href="<?= base_url('logout') ?>">🚪 Logout</a>
        </div>

        <div class="main-content">

            <h2>Welcome, <?= session()->get('customer_name'); ?> 👋</h2>

            <div class="stats">

                <div class="stat-card">
                    <h3>Total Orders</h3>
                    <p><?= $totalOrders ?></p>
                </div>
<!-- 
                <div class="stat-card">
                    <h3>Wishlist</h3>
                    <p>0</p>
                </div> -->

                <div class="stat-card">
                    <h3>Saved Addresses</h3>
                    <p><?= $totalAddresses ?></p>
                </div>

            </div>

            <div class="recent-orders">
                <h3>Recent Orders</h3>

                <table>
                    <tr>
                        <th>Order ID</th>
                        <th>Amount</th>
                        <th>Status</th>
                    </tr>

                    <?php foreach ($orders as $order): ?>
                        <tr>
                            <td>#<?= $order['order_id']; ?></td>
                            <td>₹<?= $order['total_amount']; ?></td>
                            <td><?= $order['order_status']; ?></td>
                        </tr>
                    <?php endforeach; ?>

                </table>
            </div>


            <div class="account-details">

                <h3>Account Details</h3>

                <div class="details-grid">

                    <div class="detail-box">
                        <strong>Name</strong>
                        <p>
                            <?= esc($customer['first_name']) ?>
                            <?= esc($customer['last_name']) ?>
                        </p>
                    </div>

                    <div class="detail-box">
                        <strong>Email</strong>
                        <p><?= esc($customer['email']) ?></p>
                    </div>

                    <div class="detail-box">
                        <strong>Phone</strong>
                        <p><?= esc($customer['phone']) ?></p>
                    </div>

                    <div class="detail-box">
                        <strong>Address</strong>
                        <p>
                            <?= esc($customer['address']) ?>,
                            <?= esc($customer['city']) ?>,
                            <?= esc($customer['state']) ?>
                        </p>
                    </div>

                </div>

                <a href="<?= base_url('customer/edit-profile') ?>" class="edit-btn">
                    Edit Profile
                </a>

            </div>
        </div>
</body>

</html>