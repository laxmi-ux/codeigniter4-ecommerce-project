<?php 
// Think it like address 
namespace App\Models;

// want to use Model built in function
use CodeIgniter\Model;

//AdminModel inherits Model feature
class CustomerModel extends Model 
{
    // which database table
    protected $table= 'customer';

    // Every table has a unique column.
    protected $primaryKey = 'id';

    
    protected $allowedFields = [ 
        'first_name',
        'last_name',
        'email',
        'password',
        'phone',
        'gender',
        'date_of_birth',
        'address',
        'city',
        'state',
        'pincode',
        'country',
        'status',
        'created_at',
        'updated_at'
    ];
}