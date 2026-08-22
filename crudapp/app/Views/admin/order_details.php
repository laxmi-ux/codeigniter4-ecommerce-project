<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title>Order Page</title>
</head>

<body>


    <div class="sidebar">
        <h2>Admin Panel </h2>
        <ul>
            <li><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
            <li><a href="<?= base_url('admin/profile') ?>">Profile</a></li>
            <li class="dropdown">
                <a href="#">Product ▾</a>

                <ul class="dropdown-menu">
                    <li>
                        <a href="<?= base_url('admin/product') ?>">
                            Add Product
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('admin/list') ?>">

                            View Product
                        </a>
                    </li>
                </ul>
            </li>

            <li><a href="<?= base_url('admin/customer') ?>">
                    Customer</a></li>
            <li><a href="<?= base_url('admin/order') ?>" class="<?= (uri_string() == 'admin/order') ? 'active' : '' ?>">Orders</a></li>
            <li class="dropdown">
                <a href="#">Category▾</a>

                <ul class="dropdown-menu">
                    <li>
                        <a href="<?= base_url('admin/category') ?>">
                            Add Category
                        </a>
                    </li>

                    <li>
                        <a href="<?= base_url('admin/catManage') ?>">
                            View Category
                        </a>
                    </li>
                </ul>
            </li>

            <li><a href="<?= base_url('admin/reports') ?>">Reports</a></li>
            <li><a href="<?= base_url('admin/login') ?>">Logout</a></li>
        </ul>
    </div>

    <div class="main">
        <div class="topbar">
            <h1>
                Welcome, Admin
            </h1>
        </div>

        <div class="order-card">

            <div class="order-header">
                <h2>📦 Order Details</h2>
            </div>

            <table class="order-table">

                <tr>
                    <th>Customer Name</th>
                    <td><?= $orders['first_name']; ?> <?= $orders['last_name']; ?></td>
                </tr>

                <tr>
                    <th>Email</th>
                    <td><?= $orders['email']; ?></td>
                </tr>

                <tr>
                    <th>Address</th>
                    <td><?= $orders['address']; ?><br>
                        <?= $orders['city']; ?>,
                        <?= $orders['pincode']; ?>,
                        <?= $orders['state']; ?>,
                        <?= $orders['country']; ?>.

                    </td>

                </tr>
                <tr>
                    <th>Phone</th>
                    <td><?= $orders['phone']; ?></td>
                </tr>

                <tr>
                    <th>Order ID</th>
                    <td><?= $orders['order_id']; ?></td>
                </tr>

                <tr>
                    <th>Order Date</th>
                    <td><?= $orders['created_at']; ?></td>
                </tr>

                <tr>
                    <th>Order Status</th>
                    <td>
                        <span class="badge badge-delivered">
                            <?= $orders['order_status']; ?>
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>Payment Method</th>
                    <td><?= $orders['payment_method']; ?></td>
                </tr>

                <tr>
                    <th>Payment Status</th>
                    <td>
                        <span class="badge badge-paid">
                            <?= $orders['payment_status']; ?>
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>Total Amount</th>
                    <td>₹<?= number_format($orders['total_amount'], 2); ?></td>
                </tr>







            </table>



        </div>



        <div class="order-card">

            <div class="order-header">
                <h2>📦Product Ordered</h2>
            </div>

            <table class="order-table">

                <?php foreach ($items as $item): ?>

                    <tr>
                        <th>Product Name</th>
                        <td><?= $item['name']; ?></td>
                    </tr>
                    <tr>
                        <th>Product Quantity</th>
                        <td><?= $item['quantity']; ?></td>
                        </tr>

                        <tr>
                            <th>Product Price</th>
                        <td>₹<?= $item['price']; ?></td>
                        </tr>
                        <tr>
                            <th>SubTotal</th>
                        <td>₹<?= $item['subtotal']; ?></td>
                    </tr>

                <?php endforeach; ?>

            

            </table>

            <div class="order-footer">
                <a href="<?= base_url('admin/order'); ?>" class="back-btn">
                    ← Back to Orders
                </a>
            </div>

        </div>


</body>

</html>