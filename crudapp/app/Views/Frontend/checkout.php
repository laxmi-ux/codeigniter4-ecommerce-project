<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url('css/style1.css') ?>">
    <title>Fashion Store</title>

    <link rel="stylesheet" href="css/style.css">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">

</head>

<body>

    <!-- Navbar -->


    <nav class="navbar">



        <div class="logo">
            Fashion<span>Hub</span>
        </div>

        <ul class="nav-links">

            <li><a href="<?= base_url('home') ?>">Home</a></li>
            <li><a href="<?= base_url('shop') ?>">Shop</a></li>
            <li> <a href="<?= base_url('category/5') ?>">Men</a></li>
            <li> <a href="<?= base_url('category/4') ?>">Women</a></li>


        </ul>

        <div class="icons">

            <a href="#"><i class="fa-solid fa-magnifying-glass"></i></a>


            <a href="<?= base_url('customer/dashboard') ?>"><i class="fa-solid fa-user"></i></a>


            <?php
            //get cart from session 
            $cart = session()->get('cart') ?? [];
            // Initialize the counter
            $count = 0;

            //Loop through each product
            // The loop runs once for each product.
            foreach ($cart as $item) {
                //    Add the quantity
                $count += $item['qty'];
            }
            ?>
            <!-- // show on the cart  because of css  -->
            <div class="cart-icon">
                <a href="<?= base_url('cart') ?>">
                    <i class="fa-solid fa-cart-shopping"></i>

                    <?php if ($count > 0): ?>
                        <span class="cart-badge"><?= $count ?></span>
                    <?php endif; ?>
                </a>
            </div>

            <!-- 
            <a href="<?= base_url('register') ?>" class="login-btn">Register</a>
            <a href="<?= base_url('login') ?>" class="login-btn">Login</a> -->


        </div>

    </nav>
    <form action="<?= base_url('placeOrder') ?>" method="post">

        <!-- Customer Details  -->
        <div class="checkout-container">


            <!-- Left -->
            <div class="customer-box">

                <h2>Customer Details</h2>

                <label><strong>Name:</strong>
                    <?= ($customer['first_name'] ?? '') ?>
                    <?= ($customer['last_name'] ?? '') ?>
                </label>

                <label><strong>Phone:</strong>
                    <?= $customer['phone'] ?? '' ?>
                </label>

                <label><strong>Email:</strong>
                    <?= $customer['email'] ?? '' ?>
                </label>


                <h3>Delivery Address</h3>

                <?php foreach ($addresses as $address): ?>

                    <label class="address-card">

                        <input type="radio"
                            name="shipping_address_id"
                            value="<?= $address['id']; ?>"
                            <?= $address['is_default'] ? 'checked' : '' ?>>

                        <strong><?= $address['full_name']; ?></strong><br>

                        <?= $address['address']; ?><br>

                        <?= $address['city']; ?>,
                        <?= $address['state']; ?> -
                        <?= $address['pincode']; ?><br>

                        <?= $address['phone']; ?>

                    </label>

                <?php endforeach; ?>


                <div class="address-buttons">

                    <a href="<?= base_url('customer/address') ?>" class="btn">
                        Change Address
                    </a>

                    <a href="<?= base_url('customer/add-address') ?>" class="btn">
                        + Add New Address
                    </a>

                </div>





            </div>

            <!-- Right -->
            <div class="order-box">

                <h2>Order Summary</h2>

                <?php

                $subtotal = 0;

                foreach ($cart as $item):

                    $price = (float) str_replace(['₹', ','], '', $item['price']);
                    $qty   = (int) $item['qty'];

                    $lineTotal = $price * $qty;
                    $subtotal += $lineTotal;
                ?>

                    <p>
                        <strong><?= $item['name'] ?></strong><br>
                        ₹<?= number_format($price, 2) ?> × <?= $qty ?>
                        = ₹<?= number_format($lineTotal, 2) ?>
                    </p>

                    <hr>

                <?php endforeach; ?>


                <?php
                // Discount
                $discount = 0;

                if ($subtotal >= 5000) {
                    $discount = $subtotal * 0.10;
                } elseif ($subtotal >= 2000) {
                    $discount = $subtotal * 0.05;
                }

                // Shipping
                $shippingCharge = ($subtotal >= 1000) ? 0 : 80;

                $tax = $tax ?? 0;

                // Final Total
                $grandTotal = $subtotal - $discount + $shippingCharge + $tax;
                ?>

                <table width="100%">
                    <tr>
                        <td>Subtotal</td>
                        <td align="right">₹<?= number_format($subtotal, 2) ?></td>
                    </tr>

                    <tr>
                        <td>Discount</td>
                        <td align="right">- ₹<?= number_format($discount, 2) ?></td>
                    </tr>

                    <tr>
                        <td>Shipping</td>
                        <td align="right">₹<?= number_format($shippingCharge, 2) ?></td>
                    </tr>

                    <?php if (!empty($cgst)): ?>

                        <tr>
                            <td>CGST (9%)</td>
                            <td align="right">₹<?= number_format($cgst, 2) ?></td>
                        </tr>

                        <tr>
                            <td>SGST (9%)</td>
                            <td align="right">₹<?= number_format($sgst, 2) ?></td>
                        </tr>

                    <?php else: ?>
                        <tr id="cgstRow" style="display:none;">
                            <td>CGST (9%)</td>
                            <td align="right">₹<span id="cgst">0.00</span></td>
                        </tr>

                        <tr id="sgstRow" style="display:none;">
                            <td>SGST (9%)</td>
                            <td align="right">₹<span id="sgst">0.00</span></td>
                        </tr>

                        <tr id="igstRow" style="display:none;">
                            <td>IGST (18%)</td>
                            <td align="right">₹<span id="igst">0.00</span></td>
                        </tr>

                        <tr>
                            <th>Grand Total</th>
                            <th align="right">₹<span id="grandTotal"><?= number_format($grandTotal, 2) ?></span></th>
                        </tr>
                    <?php endif; ?>

               
                </table>

                <p><strong>Items:</strong> <?= count($cart) ?></p>

                <br>

                <h3>Payment Method</h3>

                <label>
                    <input type="radio" name="payment_method" value="Cash on Delivery" required>
                    Cash on Delivery
                </label>

                <label>
                    <input type="radio" name="payment_method" value="UPI">
                    UPI
                </label>

                <label>
                    <input type="radio" name="payment_method" value="Card">
                    Card
                </label>

                <br><br>

                <button type="submit" class="place-btn">
                    Place Order
                </button>

            </div>

        </div>

        </div>
    </form>
    <!-- Footer -->

    <footer>

        <p>© 2025 FashionHub. All Rights Reserved.</p>

    </footer>

    <script>
        document.querySelectorAll("input[name='shipping_address_id']").forEach(function(radio) {

            radio.addEventListener("change", function() {

                fetch("<?= base_url('get-tax') ?>", {

                        method: "POST",

                        headers: {
                            "Content-Type": "application/x-www-form-urlencoded"
                        },

                        body: "shipping_address_id=" + this.value

                    })

                    .then(response => response.json())

                    .then(data => {

                        if (data.igst > 0) {

                            document.getElementById("igstRow").style.display = "table-row";
                            document.getElementById("cgstRow").style.display = "none";
                            document.getElementById("sgstRow").style.display = "none";

                            document.getElementById("igst").innerHTML = data.igst;

                        } else {

                            document.getElementById("igstRow").style.display = "none";
                            document.getElementById("cgstRow").style.display = "table-row";
                            document.getElementById("sgstRow").style.display = "table-row";

                            document.getElementById("cgst").innerHTML = data.cgst;
                            document.getElementById("sgst").innerHTML = data.sgst;
                        }

                        document.getElementById("grandTotal").innerHTML = data.grandTotal;

                    });

            }); 

        });
    </script>
</body>

</html>