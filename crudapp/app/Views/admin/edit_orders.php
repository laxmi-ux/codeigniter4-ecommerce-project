<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title>Edit Order</title>
</head>

<body>

<div class="sidebar">
    <h2>Admin Panel</h2>

    <ul>
        <li><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
        <li><a href="<?= base_url('admin/profile') ?>">Profile</a></li>

        <li class="dropdown">
            <a href="#">Product ▾</a>

            <ul class="dropdown-menu">
                <li><a href="<?= base_url('admin/product') ?>">Add Product</a></li>
                <li><a href="<?= base_url('admin/list') ?>">View Product</a></li>
            </ul>
        </li>

        <li><a href="<?= base_url('admin/customer') ?>">Customer</a></li>
        <li><a href="<?= base_url('admin/order') ?>" class="<?= (uri_string() == 'admin/order') ? 'active' : '' ?>">Orders</a></li>

        <li class="dropdown">
            <a href="#">Category ▾</a>

            <ul class="dropdown-menu">
                <li><a href="<?= base_url('admin/category') ?>">Add Category</a></li>
                <li><a href="<?= base_url('admin/catManage') ?>">View Category</a></li>
            </ul>
        </li>

        <li><a href="<?= base_url('admin/reports') ?>">Reports</a></li>
        <li><a href="<?= base_url('admin/login') ?>">Logout</a></li>
    </ul>
</div>

<div class="main">

    <div class="topbar">
        <h1>Welcome, Admin</h1>
    </div>

    <div class="container">

        <div class="editproduct">

            <h1>Edit Order</h1>

            <form action="<?= base_url('admin/order/update/' . $orders['order_id']) ?>" method="post">

                <label>Order ID</label>
                <input type="text" value="<?= $orders['order_id']; ?>" readonly>

                <label>Customer ID</label>
                <input type="text" value="<?= $orders['customer_id']; ?>" readonly>

                <label>Total Amount</label>
                <input type="text" value="₹<?= $orders['total_amount']; ?>" readonly>

                <label>Payment Method</label>
                <input type="text" value="<?= $orders['payment_method']; ?>" readonly>

                <label>Payment Status</label>
                <select name="payment_status">
                    <option value="Pending" <?= $orders['payment_status']=='Pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="Paid" <?= $orders['payment_status']=='Paid' ? 'selected' : '' ?>>Paid</option>
                    <option value="Failed" <?= $orders['payment_status']=='Failed' ? 'selected' : '' ?>>Failed</option>
                </select>

                <label>Order Status</label>
                <select name="order_status">
                    <option value="Pending" <?= $orders['order_status']=='Pending' ? 'selected' : '' ?>>Pending</option>
                    <option value="Processing" <?= $orders['order_status']=='Processing' ? 'selected' : '' ?>>Processing</option>
                    <option value="Shipped" <?= $orders['order_status']=='Shipped' ? 'selected' : '' ?>>Shipped</option>
                    <option value="Delivered" <?= $orders['order_status']=='Delivered' ? 'selected' : '' ?>>Delivered</option>
                    <option value="Cancelled" <?= $orders['order_status']=='Cancelled' ? 'selected' : '' ?>>Cancelled</option>
                </select>

                <label>Order Date</label>
                <input type="text" value="<?= $orders['created_at']; ?>" readonly>

                <button type="submit">Update Order</button>

            </form>

        </div>

    </div>

</div>

</body>
</html>