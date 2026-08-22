<?php 
// Think it like address 
namespace App\Models;

// want to use Model built in function
use CodeIgniter\Model;

//AdminModel inherits Model feature
class CategoryModel extends Model 
{
    // which database table
    protected $table= 'category';

    // Every table has a unique column.
    protected $primaryKey = 'id';

    
    protected $allowedFields = [ 
        'image',
        'name',
        'status',
        'created_at'
    ];
}