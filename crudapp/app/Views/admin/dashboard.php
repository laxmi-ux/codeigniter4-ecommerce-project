<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title>Admin Panel</title>

</head>

<body>

<button class="menu-toggle">
    ☰
</button>


    <div class="sidebar">
        <h2>Admin Panel </h2>
        <ul>
            <li>
                <a href="<?= base_url('admin/dashboard') ?>"
                    class="<?= (uri_string() == 'admin/dashboard') ? 'active' : '' ?>">
                    Dashboard
                </a>
            </li>

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

            <li><a href="<?= base_url('admin/customer') ?>">Customer</a></li>
            <li><a href="<?= base_url('admin/order') ?>">Orders</a></li>
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
        <div class="container">

            <div class="dashboard-cards">


                <div class="card">
                    <h3>Revenue</h3>
                    <h2>₹<?= $sales->total ?? 0 ?></h2>
                </div>

                <div class="card">
                    <h3>Total Product</h3>
                    <h2><?= $product->total ?? 0 ?></h2>
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
                    <h3>Pending Orders</h3>
                    <h2><?= $pending ?? 0 ?></h2>
                </div>

                <div class="card">
                    <h3>Categories</h3>
                    <h2><?= $category->total ?? 0 ?></h2>
                </div>

            </div>



            <script>const menu = document.querySelector(".menu-toggle");
const sidebar = document.querySelector(".sidebar");

menu.addEventListener("click", () => {
    sidebar.classList.toggle("show");
});</script>

</body>

</html>