<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title>Customer</title>
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

            <li><a href="<?= base_url('admin/customer') ?>" class="<?= (uri_string() == 'admin/customer') ? 'active' : '' ?>">
                    Customer</a></li>
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
                <th>First Name</th>
                <th>Last Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th>Gender</th>
                <th>Date Of Birth</th>
                <th>Address</th>

                <th>Status</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
            <?php foreach ($customer as $row): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['first_name']; ?></td>
                    <td><?= $row['last_name'] ?></td>
                    <td><?= $row['email'] ?></td>
                    <td><?= $row['phone'] ?></td>
                    <td><?= $row['gender'] ?></td>
                    <td><?= $row['date_of_birth']; ?></td>
                    <td><?= $row['address'] ?>,
                   <?= $row['city'] ?>,
                   <?= $row['state'] ?>,
                  <?= $row['pincode'] ?>,
                    <?= $row['country'] ?></td>
                    <td><?= $row['status'] ?></td>
                    <td><?= $row['created_at'] ?></td>


                    <td>
                        <a href="<?= base_url('admin/customer/edit/' . $row['id']); ?>" class="edit-link">
                            Edit
                        </a>
                        <br><br>

                        <a href="<?= base_url('admin/customer/delete/' . $row['id']); ?>"
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