<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table = 'orders';
    protected $primaryKey = 'order_id';

    protected $allowedFields = [
        'invoice_no',
        'customer_id',
        'billing_address_id',
        'shipping_address_id',

        'total_amount',
        'subtotal',
        'discount',
        'shipping_charge',  
        'tax',
        'grand_total',

        'order_date',
        'payment_method',
        'payment_status',
        'order_status',
        'created_at'
    ];
}
