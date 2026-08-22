<?php

namespace App\Controllers;


// use both model category and prdouct 
use App\Models\ProductModel;
use App\Models\CategoryModel;

class IndexController extends BaseController
{
    public function index()
    {
        $productModel = new ProductModel();

        $data['products'] = $productModel->findAll();

        return view('Frontend/home', $data);
    }

     public function cart()
    {
       return view('Frontend/cart');
    }
    

      public function category($id)
    {
        // create object of category model
        $categoryModel = new CategoryModel();
        // create object of product model
        $productModel = new ProductModel();

        // select id from category
        $data['category'] = $categoryModel->find($id);

        //select product according to category id and then all details of that slected product 
        $data['products'] = $productModel
            ->where('category_id', $id)
            ->findAll();

        return view('Frontend/categories_product', $data);
    }

    
}