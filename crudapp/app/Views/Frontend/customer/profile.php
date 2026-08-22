<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/style1.css') ?>">
    <title>My Profile</title>

    <link rel="stylesheet" href="css/style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>

    <!-- Navbar -->


    <div class="customer-layout">

        <!-- Sidebar -->
      <div class="sidebar">
        <h2>My Account</h2>

        <a href="<?= base_url('customer/dashboard') ?>">🏠 Dashboard</a>

        <a href="<?= base_url('customer/orders') ?>">📦 My Orders</a>

        <a href="<?= base_url('customer/profile') ?>">👤 My Profile</a>

        <a href="<?= base_url('customer/address') ?>">📍 Address Book</a>


        <a href="<?= base_url('customer/change_password') ?>">🔒 Change Password</a>

        <a href="<?= base_url('logout') ?>">🚪 Logout</a>
    </div>



        <!-- Profile Content -->
        <div class="content-area">

            <div class="profile-card">

                <div class="profile-header">

                    <h2>
                        <?= esc($customer['first_name']) ?>
                        <?= esc($customer['last_name']) ?>
                    </h2>

                    <p>Customer</p>

                </div>

                <div class="profile-body">

                    <div class="profile-row">
                        <label>Full Name :- <span><?= esc($customer['first_name']) ?>
                                <?= esc($customer['last_name']) ?></span></label>

                    </div>

                    <div class="profile-row">
                        <label>Email :- <span><?= esc($customer['email']) ?>
                            </span></label>

                    </div>
                    <div class="profile-row">
                        <label>Phone Number :- <span><?= esc($customer['phone']) ?>
                            </span></label>

                    </div>

                      <div class="profile-row">
                        <label>Gender :- <span><?= esc($customer['gender']) ?></label>
                        
                        </span>
                    </div>

                    <div class="profile-row">
                        <label>Address :- <span ><?= esc($customer['address']) ?><span><br>
                                <span style="margin-left: 90px;"><?= esc($customer['pincode']) ?>,
                                <?= esc($customer['city']) ?>,
                                <?= esc($customer['state']) ?>,
                                <?= esc($customer['country']) ?>.
                            </span></label>

                    </div>
                  




                </div>

                <div class="profile-footer">
                    <a href="<?= base_url('customer/edit-profile') ?>" class="btn-edit">
                        Edit Profile
                    </a>
                </div>

            </div>

        </div>

    </div>

 

</body>

</html>