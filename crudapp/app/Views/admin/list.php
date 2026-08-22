<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title>Product List</title>
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
                        <a href="<?= base_url('admin/list') ?>"
                          class="<?= (uri_string() == 'admin/list') ? 'active' : '' ?>">
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
        <table border="1" width="100%">
            <tr>
                <th>ID</th>
                <th>Image</th>
                <th>Name</th>
                <th>Category</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php foreach ($products as $row): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td>
                        <img src="<?= base_url('uploads/products/' . $row['image']) ?>" width="80">
                    </td>
                    <td><?= $row['name']; ?></td>
                     <td><?= $row['category'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['stock'] ?></td>
                    <td><?= $row['status'] ?></td>
                   
                    <td>
                        <a href="<?= base_url('admin/product/edit/' . $row['id']); ?>" class="edit-link">
                            Edit
                        </a>

                        <a href="<?= base_url('admin/product/delete/' . $row['id']); ?>"
                            class="delete-link"
                            onclick="return confirm('Are You Sure ?')">
                            Delete
                        </a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
</body>

</html>