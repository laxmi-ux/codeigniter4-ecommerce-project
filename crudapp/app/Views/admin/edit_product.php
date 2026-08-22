<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title>Product Page </title>
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
            <div class="editproduct">
                <h1>Add Product </h1>
                <form action="<?= base_url('admin/product/update/' . $product['id']) ?>" method="post" enctype="multipart/form-data">

                    <label for="Name">Product Name</label>
                    <input type="text" name="name" value="<?= $product['name'] ?>">

                    <label>Current Image</label>
                    <img src="<?= base_url('uploads/products/' . $product['image']) ?>" width="100">

                    <label>Change Image</label>
                    <input type="file" name="image">
                    <label for="Price">Product Price</label>
                    <input type="text" name="price" value="<?= $product['price'] ?>">
                    <label for="Stock">Product Stock</label>
                    <input type="text" name="stock" value="<?= $product['stock'] ?>">


                    <label>Category</label>
                    <select name="category">
                        <option value="All" <?= $product['category'] == 'Active' ? 'selected' : '' ?>>All </option>
                        <option value="Women" <?= $product['category'] == 'Women' ? 'selected' : '' ?>>Women</option>
                         <option value="Men" <?= $product['category'] == 'Men' ? 'selected' : '' ?>>Men</option>
                        <option value="Kids" <?= $product['category'] == 'Kids' ? 'selected' : '' ?>>Kids</option>
                    </select>
                    <label>Status</label>
                    <select name="status">
                        <option value="Active" <?= $product['status'] == 'Active' ? 'selected' : '' ?>>Active</option>

                        <option value="Inactive" <?= $product['status'] == 'Inactive' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                    <button type="submit">Save Product</button>
                </form>
            </div>
        </div>
</body>

</html>