<?php 
// Think it like address 
namespace App\Models;

// want to use Model built in function
use CodeIgniter\Model;

//AdminModel inherits Model feature
class CustomerAddressModel extends Model 
{
    // which database table
    protected $table= 'customer_addresses';

    // Every table has a unique column.
    protected $primaryKey = 'id';

    
    protected $allowedFields = [ 
        'customer_id',
        'full_name',
        'phone',
        'address',
        'city',
        'state',
        'pincode',
        'country',
        'is_default',
        'created_at',
        'address_type'
    ];
}