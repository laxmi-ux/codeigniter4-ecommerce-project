<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ShopController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();

        $data['products'] = $productModel->findAll();

        return view('Frontend/shop', $data);
    }

    public function productDetails($id) 
    {
        // create object
        $productModel = new ProductModel();

         // Select * from  query 
        $data ['products'] = $productModel->find($id);

        // if data not found 
        if(!$data['products']) {
            throw \CodeIgniter\Exceptions\PageNotFoundException::forPageNotFound();
        }
         
        // redirect to product details page 
        return view('Frontend/product_details', $data);
    }
}