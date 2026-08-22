<?php 
// Think it like address 
namespace App\Models;

// want to use Model built in function
use CodeIgniter\Model;

//AdminModel inherits Model feature
class AdminModel extends Model 
{
    // which database table
    protected $table= 'admin';

    // Every table has a unique column.
    protected $primaryKey = 'id';

    
    protected $allowedFields = [ 
        'name',
        'email',
        'phone',
        'username',
        'password',
        'created_at'
    ];
}