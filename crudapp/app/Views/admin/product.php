<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title>Product Page </title>
</head>
<style>


</style>

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
                        <a href="<?= base_url('admin/product') ?>"
                          class="<?= (uri_string() == 'admin/product') ? 'active' : '' ?>">
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
        <div class="container1">
             <div class="product-form">
            <h1>Add Product </h1>
            <form action="<?= base_url('admin/product/store') ?>" method="post" enctype="multipart/form-data">

                <label for="Name">Product Name</label>
                <input type="text" name="name" placeholder="Enter Prdouct Name">

                  <label>Category</label>

                <select name="status">
                    <option value="All">All</option>
                    <option value="Women">Women</option>
                    <option value="Men">Men</option>
                    <option value="Kids">Kids</option>
                </select>

                <label>Product Image</label>
                <input type="file" name="image">

                <label for="Price">Product Price</label>
                <input type="text" name="price" placeholder="Enter Prdouct Price">
                <label for="Stock">Product Stock</label>
                <input type="text" name="stock" placeholder="Enter Prdouct Stock">
                <label>Status</label>

                <select name="status">
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
                <button type="submit">Save Product</button>
            </form>
             </div>
        </div>
</body>

</html>