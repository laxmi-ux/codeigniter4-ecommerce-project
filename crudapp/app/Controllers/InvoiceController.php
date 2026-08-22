<?php

namespace App\Controllers;

use App\Models\OrderModel;
use App\Models\OrderItemModel;
use App\Models\PaymentModel;
use App\Models\CustomerAddressModel;

class InvoiceController extends BaseController
{
   public function getInvoice($orderId)
{
    $orderModel = new OrderModel();
    $orderItemModel = new OrderItemModel();
    

    // Invoice details
    $data['order'] = $orderModel
        ->select('
            orders.*,
            customer_addresses.full_name,
            customer_addresses.phone,
            customer_addresses.address,
            customer_addresses.city,
            customer_addresses.state,
            customer_addresses.pincode,
            customer_addresses.country,
            payments.payment_method,
            payments.payment_status,
            payments.transaction_id
        ')
        ->join(
            'customer_addresses',
            'customer_addresses.id = orders.shipping_address_id',
            'left'
        )
        ->join(
            'payments',
            'payments.order_id = orders.order_id',
            'left'
        )
        ->where('orders.order_id', $orderId)
        ->first();

    // Products
    $data['items'] = $orderItemModel
        ->select('
            order_items.*,
            product.name,
            product.image
        ')
        ->join(
            'product',
            'product.id = order_items.product_id'
        )
        ->where('order_items.order_id', $orderId)
        ->findAll();
    

    return view('Frontend/customer/view_order', $data);
}
}
