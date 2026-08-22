<?php

namespace App\Models;

use CodeIgniter\Model;

class RegisterModel extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'first_name',
        'last_name',
        'email',
        'phone',
        'password',
        'gender',
        'date_of_birth',
        'address',
        'city',
        'state',
        'pincode',
        'country',
        'status'
    ];
}