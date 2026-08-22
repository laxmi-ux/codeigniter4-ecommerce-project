<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reports</title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
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
            <li><a href="<?= base_url('admin/order') ?>">Orders</a></li>

            <li class="dropdown">
                <a href="#">Category ▾</a>
                <ul class="dropdown-menu">
                    <li><a href="<?= base_url('admin/category') ?>">Add Category</a></li>
                    <li><a href="<?= base_url('admin/catManage') ?>">View Category</a></li>
                </ul>
            </li>

            <li><a href="<?= base_url('admin/reports') ?>" class="active">Reports</a></li>
            <li><a href="<?= base_url('admin/login') ?>">Logout</a></li>
        </ul>
    </div>

    <div class="main">

        <div class="topbar">
            <h1>Reports</h1>
        </div>

        <div class="container">

            <div class="dashboard-cards">

                <div class="card">
                    <h3>Total Sales</h3>
                    <h2>₹<?= $sales->total ?? 0 ?></h2>
                </div>

                <div class="card">
                    <h3>Total Orders</h3>
                    <h2><?= $orders->total ?? 0 ?></h2>
                </div>

                <div class="card">
                    <h3>Total Customers</h3>
                    <h2><?= $customer->total ?? 0 ?></h2>
                </div>

                <div class="card">
                    <h3>Total Products</h3>
                    <h2><?= $product->total ?? 0 ?></h2>
                </div>

            </div>

            <br><br>

            <h2>Order Status Report</h2>

            <table class="report-table">
                <tr>
                    <td class="pending">Pending</td>
                    <td><?= $pending ?? 0 ?></td>
                </tr>

                <tr>
                    <td class="processing">Processing</td>
                    <td><?= $processing ?? 0 ?></td>
                </tr>

                <tr>
                    <td class="shipped">Shipped</td>
                    <td><?= $shipped ?? 0 ?></td>
                </tr>

                <tr>
                    <td class="delivered">Delivered</td>
                    <td><?= $delivered ?? 0 ?></td>
                </tr>

                <tr>
                    <td class="cancelled">Cancelled</td>
                    <td><?= $cancelled ?? 0 ?></td>
                </tr>
            </table>

        </div>

    </div>

</body>

</html>