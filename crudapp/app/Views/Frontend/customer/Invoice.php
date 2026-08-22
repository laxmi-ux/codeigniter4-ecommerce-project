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
</body>

</html>