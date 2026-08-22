<?php 

namespace App\Models;

use CodeIgniter\Model;


class  PaymentModel extends Model
{
    protected $table = 'payments';

    protected $allowedFields = [
        'payment_id',
        'order_id',
        'transaction_id',
        'payment_method',
        'payment_status',
        'amount',
        'paid_at',
        'updated_at',
        'created_at'
    ];
}