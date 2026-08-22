<?php
/** @var array $order */
/** @var array $items */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
    <title>Admin Panel</title>

</head>

<body>

   


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
    
        

        <div id="invoice-container">

            <h2 class="invoice-title">Invoice #<?= $order['order_id'] ?></h2>


            <div class="invoice-details">
                <p><strong>Total Amount:</strong> ₹<?= $order['total_amount'] ?></p>
                <p><strong>Payment Status:</strong>
                    <span class="status-paid"><?= $order['payment_status'] ?></span>
                </p>
                <p><strong>Order Status:</strong>
                    <span class="status-pending"><?= $order['order_status'] ?></span>
                </p>
            </div>

            <table class="invoice-table">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Qty</th>
                        <th>Price</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>

                <tbody>
                    <?php if (!empty($items)): ?>
                        <?php foreach ($items as $item): ?>
                            <tr>
                                <td><?= $item['product_name'] ?></td>
                                <td><?= $item['quantity'] ?></td>
                                <td>₹<?= $item['price'] ?></td>
                                <td>₹<?= $item['subtotal'] ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
            <a href="javascript:void(0);" onclick="window.print();" class="print-btn">
                Print Invoice
            </a>
        </div>


        <script>
            function printInvoice() {
                var printContents = document.getElementById('invoice-container').innerHTML;
                var originalContents = document.body.innerHTML;

                document.body.innerHTML = printContents;
                window.print();
                document.body.innerHTML = originalContents;

                location.reload();
            }
        </script>
    </div>


</body>

</html>