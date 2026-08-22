<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title>Document</title>
</head>

<body>
     
    <div class="sidebar">
        <h2>Admin Panel </h2>
        <ul>
            <li><a href="<?= base_url('admin/dashboard') ?>">Dashboard</a></li>
            <li><a href="<?= base_url('admin/profile') ?>" 
              class="<?= (uri_string() == 'admin/profile') ? 'active' : '' ?>">Profile</a></li>
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
    <div class="container1">

        <div class="profile-card">

            <h2>Admin Profile</h2>

            <form action="<?= base_url('admin/updateProfile') ?>" method="post" enctype="multipart/form-data">

              

                <div class="form-group">
                    <label>Full Name</label>
                    <input type="text" name="name" value="<?= $admin['name'] ?>">
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input type="text" name="username" value="<?= $admin['username'] ?>">
                </div>

                <div class="form-group">
                    <label>Email</label>
                    <input type="email" name="email" value="<?= $admin['email'] ?>">
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" name="phone" value="<?= $admin['phone'] ?>">
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input type="password" name="password" >
                </div>

                <button type="submit">Update Profile</button>

            </form>

        </div>

    </div>

</body>

</html>