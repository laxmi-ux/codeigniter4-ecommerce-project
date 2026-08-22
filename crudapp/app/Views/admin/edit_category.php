<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title>Category Page</title>
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
                <h1>Add Category </h1>
                <form action="<?= base_url('admin/category/update/' . $category['id']) ?>" method="post" enctype="multipart/form-data">

                    <label for="Name">Category Name</label>
                    <input type="text" name="name" value="<?= $category['name'] ?>">

                    <label>Current Image</label>
                    <img src="<?= base_url('uploads/categorys/' . $category['image']) ?>" width="100">

                    <label>Change Image</label>
                    <input type="file" name="image">
                    
                    <label>Status</label>
                    <select name="status">
                        <option value="Active" <?= $category['status'] == 'Active' ? 'selected' : '' ?>>Active</option>

                        <option value="Inactive" <?= $category['status'] == 'Inactive' ? 'selected' : '' ?>>Inactive</option>
                    </select>
                    <button type="submit">Save Category</button>
                </form>
            </div>
        </div>
</body>

</html>