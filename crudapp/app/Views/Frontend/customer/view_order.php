<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/style1.css') ?>">
    <title>Customer Dashboard</title>

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

        <div id="invoice-container">

            <!-- Company Header -->
            <div class="company-header">

                <div class="company-logo">
                    <div class="logo">
                        Fashion<span>Hub</span>
                    </div>
                </div>

                <div class="company-details">


                    <p><strong>GSTIN :</strong> 27ABCDE1234F1Z5</p>

                  

                    <p><strong>Phone :</strong> +91 9876543210</p>

                    <p><strong>Email :</strong> support@fashionhub.com</p>

                </div>

            </div>

            <hr>

            <h2 class="invoice-title">TAX INVOICE</h2>

            <!-- Invoice Information -->
            <div class="invoice-info">

                <div>

                    <p><strong>Invoice No :</strong>
                        <?= $order['invoice_no']; ?>
                    </p>

                    <p><strong>Order No :</strong>
                        <?= $order['order_id']; ?>
                    </p>

                </div>

                <div>

                    <p><strong>Invoice Date :</strong>
                        <?= date('d-m-Y', strtotime($order['order_date'])); ?>
                    </p>

                    <p><strong>Order Status :</strong>
                        <?= $order['order_status']; ?>
                    </p>

                </div>

            </div>

            <hr>

            <!-- Bill To & Ship To -->
            <div class="address-section">

                <div class="address-box">

                    <h3>Address:</h3>

                    <p><strong><?= $order['full_name']; ?></strong></p>

                    <p><?= $order['phone']; ?></p>

                   

                    <p>
                        <?= $order['address']; ?><br>
                        <?= $order['city']; ?>,
                        <?= $order['state']; ?><br>
                        <?= $order['pincode']; ?><br>
                        <?= $order['country']; ?>
                    </p>

                </div>


            </div>

            <hr>

            <!-- Payment -->
            <h3>Payment Details</h3>

            <table class="payment-table">

                <tr>
                    <td>Payment Method</td>
                    <td><?= $order['payment_method']; ?></td>
                </tr>

                <tr>
                    <td>Payment Status</td>
                    <td><?= $order['payment_status']; ?></td>
                </tr>

                <tr>
                    <td>Transaction ID</td>
                    <td><?= $order['transaction_id']; ?></td>
                </tr>

            </table>

            <br>

            <!-- Products -->

            <table class="invoice-table">

                <thead>

                    <tr>

                        <th>Product</th>

                        <th>Qty</th>

                        <th>Price</th>

                        <th>Discount</th>

                        <th>GST</th>

                        <th>Total</th>

                    </tr>

                </thead>

                <tbody>

                    <?php foreach ($items as $item): ?>

                        <tr>

                            <td><?= $item['name']; ?></td>

                            <td><?= $item['quantity']; ?></td>

                            <td>₹<?= number_format($item['price'], 2); ?></td>

                            <td>₹<?= number_format($item['discount'] ?? 0, 2); ?></td>

                            <td>₹<?= number_format($item['gst'], 2); ?></td>

                            <td>₹<?= number_format($item['subtotal'], 2); ?></td>

                        </tr>

                    <?php endforeach; ?>

                </tbody>

            </table>

            <!-- Summary -->

            <table class="summary-table">

                <tr>

                    <td>Subtotal</td>

                    <td>₹<?= number_format($order['subtotal'], 2); ?></td>

                </tr>

                <tr>

                    <td>Discount</td>

                    <td>₹<?= number_format($order['discount'], 2); ?></td>

                </tr>

                <tr>

                    <td>Shipping</td>

                    <td>₹<?= number_format($order['shipping_charge'], 2); ?></td>

                </tr>

                <tr>

                    <td>CGST (9%)</td>

                    <td>₹<?= number_format($order['tax'] / 2, 2); ?></td>

                </tr>

                <tr>

                    <td>SGST (9%)</td>

                    <td>₹<?= number_format($order['tax'] / 2, 2); ?></td>

                </tr>

                <tr>

                    <th>Grand Total</th>

                    <th>₹<?= number_format($order['grand_total'], 2); ?></th>

                </tr>

            </table>
            <br>

            <div class="thank-you">

                <h3>Thank You!</h3>

                <p>Thank you for shopping with FashionHub.</p>

                <p>This is a computer-generated invoice.</p>

            </div>

            <button onclick="window.print()" class="print-btn">
                Print Invoice
            </button>

        </div>
        ```



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
</body>

</html>