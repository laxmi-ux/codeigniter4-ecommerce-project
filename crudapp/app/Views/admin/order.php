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

            <li>
                <a href="<?= base_url('admin/order') ?>"
                    class="<?= (uri_string() == 'admin/order') ? 'active' : '' ?>">
                    Orders
                </a>
            </li>

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

        <table border="1" width="100%" cellspacing="0" cellpadding="10">
            <thead>
                <tr>
                    <th>Order ID</th>
                    <th>Customer ID</th>
                    <th>Total Amount</th>
                    <th>Payment Method</th>
                    <th>Payment Status</th>
                    <th>Order Status</th>
                    <th>Created At</th>
                    <th width="250">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php if (!empty($orders)): ?>
                    <?php foreach ($orders as $row): ?>
                        <tr>
                            <td><?= esc($row['order_id']) ?></td>
                            <td><?= esc($row['customer_id']) ?></td>
                            <td>₹<?= number_format($row['total_amount'], 2) ?></td>
                            <td><?= esc($row['payment_method']) ?></td>
                            <td><?= esc($row['payment_status']) ?></td>
                            <td><?= esc($row['order_status']) ?></td>
                            <td><?= esc($row['created_at']) ?></td>
                            <td>

                                <a href="<?= base_url('admin/order/delete/' . $row['order_id']) ?>"
                                    class="delete-link"
                                    onclick="return confirm('Are you sure you want to delete this order?');">
                                    Delete
                                </a>

                                <a href="<?= base_url('admin/order/edit/' . $row['order_id']) ?>" class="edit-link">
                                    Edit
                                </a>

                                <a style="margin-top: 10px; background: gray;" href="<?= base_url('admin/order/details/' . $row['order_id']) ?>" class="edit-link" style="background:gray;">
                                    Order Details
                                </a>
                                <a class="invoice-btn"  href="<?= base_url('admin/invoice/' . $row['order_id']) ?>" >
                                    Invoice
                                </a>


                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="8" style="text-align:center;">No Orders Found</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>

    </div>

</body>

</html>