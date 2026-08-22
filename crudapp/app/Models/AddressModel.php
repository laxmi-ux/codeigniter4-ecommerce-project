<?php 

namespace App\Models;

use CodeIgniter\Model;

class  AddressModel extends Model
{
    protected $table = 'customer_addresses';

    protected $allowedFields = [
        'customer_id',
        'full_name',
        'phone',
        'address',
        'city',
        'state',
        'pincode',
        'country',
        'is_default'
    ];
}