


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




    <div class="customer-layout">


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

            <h2 class="orders-title">📦 My Orders</h2>

            <?php if (!empty($orders)) : ?>

                <table class="orders-table">

                    <thead>
                        <tr>
                            <th>Order ID</th>
                            <th>Date</th>
                            <th>Total</th>
                            <th>Order Status</th>
                            <th>Payment</th>
                            <th>Action</th>
                        </tr>
                    </thead>

                    <tbody>

                        <?php foreach ($orders as $order): ?>

                            <tr>
                                <td>#<?= $order['order_id'] ?></td>

                                <td><?= $order['order_date'] ?></td>

                                <td>₹<?= number_format($order['total_amount'], 2) ?></td>

                                

                                <td><?= $order['order_status'] ?></td>

                                <td><?= $order['payment_status'] ?></td>

                                <td>
                                    
                                         <a class="edit-btn" href="<?= base_url('view_order/' . $order['order_id']) ?>">
                                       View 
                                    </a>
                                    <a class= "edit-btn" style="background: orange; color:black" href="<?= base_url('Invoice/' . $order['order_id']) ?>">
                                        Print Invoice
                                    </a>

                                </td>
                            </tr>

                        <?php endforeach; ?>

                    </tbody>

                </table>

            <?php else: ?>

                <div class="no-orders">
                    You haven't placed any orders yet.
                </div>

            <?php endif; ?>

        </div>

    </div>





</body>

</html>