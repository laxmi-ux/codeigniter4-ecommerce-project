<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title>Customer Page</title>
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
        <div class="container">
            <div class="form-card">
                <h2>Edit Customer</h2>

                <form action="<?= base_url('admin/customer/update/' . $customer['id']) ?>" method="post">

                    <div class="row">
                        <div class="form-group">
                            <label>First Name</label>
                            <input type="text" name="first_name" value="<?= esc($customer['first_name']) ?>">
                        </div>

                        <div class="form-group">
                            <label>Last Name</label>
                            <input type="text" name="last_name" value="<?= esc($customer['last_name']) ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label>Email</label>
                            <input type="email" name="email" value="<?= esc($customer['email']) ?>">
                        </div>

                        <div class="form-group">
                            <label>Phone</label>
                            <input type="text" name="phone" value="<?= esc($customer['phone']) ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender">
                                <option value="Male" <?= $customer['gender'] == 'Male' ? 'selected' : '' ?>>Male</option>
                                <option value="Female" <?= $customer['gender'] == 'Female' ? 'selected' : '' ?>>Female</option>
                                <option value="Other" <?= $customer['gender'] == 'Other' ? 'selected' : '' ?>>Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Date of Birth</label>
                            <input type="date" name="date_of_birth" value="<?= esc($customer['date_of_birth']) ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Address</label>
                        <textarea name="address" rows="3"><?= esc($customer['address']) ?></textarea>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label>City</label>
                            <input type="text" name="city" value="<?= esc($customer['city']) ?>">
                        </div>

                        <div class="form-group">
                            <label>State</label>
                            <input type="text" name="state" value="<?= esc($customer['state']) ?>">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group">
                            <label>Pincode</label>
                            <input type="text" name="pincode" value="<?= esc($customer['pincode']) ?>">
                        </div>

                        <div class="form-group">
                            <label>Country</label>
                            <input type="text" name="country" value="<?= esc($customer['country']) ?>">
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Status</label>
                        <select name="status">
                            <option value="Active" <?= $customer['status'] == 'Active' ? 'selected' : '' ?>>Active</option>
                            <option value="Blocked" <?= $customer['status'] == 'Blocked' ? 'selected' : '' ?>>Blocked</option>
                        </select>
                    </div>

                    <div class="btn-group">
                        <button class="save-btn" type="submit">Update Customer</button>

                        <a href="<?= base_url('admin/customer') ?>" class="cancel-btn">
                            Cancel
                        </a>
                    </div>

                </form>
            </div>
        </div>
    </div>
</body>

</html>