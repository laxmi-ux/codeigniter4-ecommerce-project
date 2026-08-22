<?php

namespace App\Controllers;

use App\Models\PaymentModel;  // for checking user logged in or not 
use App\Models\OrderModel;
use App\Models\ProductModel;
use App\Models\OrderItemModel;
use App\Models\RegisterModel;
use App\Models\CustomerAddressModel;


class CheckoutController extends BaseController
{

    public function index()
    {
        // checking user logged in or not 
        if (!session()->get('isLoggedIn')) {
            // if not so fisrt log in 
            return redirect()->to('/login');
        }
        // if you are log in 

        //  Get  logged-in customer id
        $customerid = session()->get('customer_id');

        // load customer model and create object
        $customerModel = new RegisterModel();

        // fetch customer details 
        $customer = $customerModel->find($customerid);

        // pass data to view 
        $data['customer'] =  $customer;

        $addressModel = new CustomerAddressModel();

        $data['addresses'] = $addressModel
            ->where('customer_id', $customerid)
            ->findAll();

        return view('Frontend/checkout', $data);
    }

    public function getTax()
    {
        $shippingAddressId = $this->request->getPost('shipping_address_id');

        $addressModel = new CustomerAddressModel();
        $address = $addressModel->find($shippingAddressId);

        $cart = session()->get('cart') ?? [];

        $subtotal = 0;

        foreach ($cart as $item) {
            $price = (float) str_replace(['₹', ','], '', $item['price']);
            $subtotal += $price * $item['qty'];
        }

        $discount = 0;

        if ($subtotal >= 5000) {
            $discount = $subtotal * 0.10;
        } elseif ($subtotal >= 2000) {
            $discount = $subtotal * 0.05;
        }

        $shippingCharge = ($subtotal >= 1000) ? 0 : 80;

        $sellerState = "Maharashtra";

        $taxableAmount = $subtotal - $discount;

        if (strcasecmp(trim($address['state']), trim($sellerState)) == 0) {

            $cgst = $taxableAmount * 0.09;
            $sgst = $taxableAmount * 0.09;
            $igst = 0;
            $tax = $cgst + $sgst;
        } else {

            $cgst = 0;
            $sgst = 0;
            $igst = $taxableAmount * 0.18;
            $tax = $igst;
        }

        $grandTotal = $subtotal - $discount + $shippingCharge + $tax;

        return $this->response->setJSON([
            'cgst' => round($cgst, 2),
            'sgst' => round($sgst, 2),
            'igst' => round($igst, 2),
            'tax' => round($tax, 2),
            'grandTotal' => round($grandTotal, 2)
        ]);
    }



    public function buyNow($id)
    {
        $productModel = new ProductModel();
        $product = $productModel->find($id);

        if (!$product) {
            return redirect()->back();
        }

        $cart = [];

        // Store only this product in the cart
        $cart[$id] = [
            'id'    => $product['id'],
            'name'  => $product['name'],
            'price' => $product['price'],
            'qty'   => 1,
            'image' => $product['image']
        ];
        session()->set('cart', $cart);

        return redirect()->to('/checkout');
    }

    // place order 
    public function placeOrder()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login');
        }

        $cart = session()->get('cart') ?? [];

        if (empty($cart)) {
            return redirect()->to('/cart');
        }

        $subtotal = 0;

        foreach ($cart as $item) {

            $price = (float) str_replace(['₹', ','], '', $item['price']);

            $subtotal += $price * $item['qty'];
        }

        // Discount 

        // eg:-
        //         ₹5000 or more → 10% discount
        //         ₹2000 or more → 5% discount
        //         Otherwise → No discount


        $discount = 0;

        if ($subtotal >= 5000) {
            $discount = $subtotal * 0.10;
        } elseif ($subtotal >= 2000) {
            $discount = $subtotal * 0.05;
        }

        // Shipping charge eg:Free shipping above ₹1000
        //                            ₹80 shipping below ₹1000

        if ($subtotal >= 1000) {
            $shippingCharge = 0;
        } else {
            $shippingCharge = 80;
        }

        $shippingAddressId = $this->request->getPost('shipping_address_id');

        // Tax calculation 
        $addressModel = new CustomerAddressModel();

        $address = $addressModel->find($shippingAddressId);



        // Final amount
        $grandTotal = $subtotal - $discount + $shippingCharge + $tax;


        $taxData = $this->calculateTax(
            $subtotal,
            $discount,
            $address['state']
        );

        $cgst = $taxData['cgst'];
        $sgst = $taxData['sgst'];
        $igst = $taxData['igst'];
        $tax  = $taxData['tax'];

        $paymentMethod = $this->request->getPost('payment_method');


        if (empty($shippingAddressId)) {
            return redirect()->back()->with('error', 'Please select a delivery address.');
        }



        $orderModel = new OrderModel();



        $invoiceNo = 'INV' . date('YmdHis');

        // 1. CREATE ORDER FIRST
        $orderModel->insert([

            'invoice_no' => $invoiceNo,

            'customer_id' => session()->get('customer_id'),

            'billing_address_id'  => $shippingAddressId,
            'shipping_address_id' => $shippingAddressId,

            'total_amount' => $subtotal,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'shipping_charge' => $shippingCharge,
            'tax' => $tax,
            'grand_total' => $grandTotal,

            'order_date' => date('Y-m-d H:i:s'),

            'payment_method' => $paymentMethod,
            'payment_status' => 'Pending',
            'order_status' => 'Pending',

            'created_at' => date('Y-m-d H:i:s')
        ]);

        $orderId = $orderModel->getInsertID();

        // 2. ORDER ITEMS
        $orderItemModel = new OrderItemModel();

        foreach ($cart as $item) {

            $price = (float) str_replace(['₹', ','], '', $item['price']);
            $itemSubtotal = $price * $item['qty'];

            $itemDiscount = 0;

            if ($subtotal > 0) {
                $itemDiscount = ($discount / $subtotal) * $itemSubtotal;
            }

            $itemTaxable = $itemSubtotal - $itemDiscount;

            $itemGST = $itemTaxable * 0.18;

            $orderItemModel->insert([
                'order_id'    => $orderId,
                'product_id'  => $item['id'],
                'product_name' => $item['name'],
                'price'       => $price,
                'quantity'    => $item['qty'],
                'subtotal'    => $itemSubtotal,
                'discount'    => round($itemDiscount, 2),
                'gst'         => round($itemGST, 2)
            ]);
        }

        // 3. PAYMENT
        $paymentModel = new PaymentModel();

        $paymentModel->insert([
            'order_id' => $orderId,
            'payment_method' => $paymentMethod,
            'payment_status' => ($paymentMethod == 'COD') ? 'Pending' : 'Pending',
            'transaction_id' => ($paymentMethod == 'COD') ? 'COD' : 'PENDING',
            'amount' => $grandTotal,
            'created_at' => date('Y-m-d H:i:s')
        ]);

        // 4. CLEAR CART
        session()->remove('cart');

        // 5. REDIRECT FLOW
        if ($paymentMethod == 'COD') {
            return redirect()->to('/order_success');
        }

        if ($paymentMethod == 'UPI') {
            session()->set('pending_order', [
                'order_id' => $orderId
            ]);
            return redirect()->to('/upi');
        }

        if ($paymentMethod == 'Card') {
            session()->set('pending_order', [
                'order_id' => $orderId
            ]);
            return redirect()->to('/card');
        }

        return redirect()->to('/order_success');
    }

    public function orderSuccess()
    {
        return view('Frontend/order_success');
    }

    public function upi()
    {
        return view('Frontend/upi');
    }



    public function upiPay()
    {
        $order = session()->get('pending_order');

        if (!$order) {
            return redirect()->to('/checkout');
        }

        $orderModel = new OrderModel();

        // update order payment
        $orderModel->update($order['order_id'], [
            'payment_status' => 'Paid'
        ]);

        $paymentModel = new PaymentModel();

        $paymentModel->where('order_id', $order['order_id'])
            ->set([
                'payment_status' => 'Paid',
                'transaction_id' => 'UPI_' . time(),
                'paid_at' => date('Y-m-d H:i:s')
            ])->update();


        session()->remove('pending_order');

        return redirect()->to('/order-success');
    }


    public function card()
    {
        return view('Frontend/card');
    }

    public function cardPay()
    {
        $order = session()->get('pending_order');

        if (!$order) {
            return redirect()->to('/checkout');
        }

        $orderModel = new OrderModel();

        $orderModel->update($order['order_id'], [
            'payment_status' => 'Paid'
        ]);

        $paymentModel = new PaymentModel();

        $paymentModel->where('order_id', $order['order_id'])
            ->set([
                'payment_status' => 'Paid',
                'transaction_id' => 'CARD_' . time(),
                'paid_at' => date('Y-m-d H:i:s')
            ])->update();

        session()->remove('pending_order');

        return redirect()->to('/order-success');
    }
}
