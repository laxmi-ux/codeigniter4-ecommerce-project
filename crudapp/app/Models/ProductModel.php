<?php 
// Think it like address 
namespace App\Models;

// want to use Model built in function
use CodeIgniter\Model;

//AdminModel inherits Model feature
class ProductModel extends Model 
{
    // which database table
    protected $table= 'product';

    // Every table has a unique column.
    protected $primaryKey = 'id';

    
    protected $allowedFields = [ 
        'image',
        'name',
        'category',
        'price',
        'stock',
        'status',
        'created_at'
    ];
}