<?php

namespace App\Controllers;

use App\Models\ProductModel;

class ProductController extends BaseController
{
    public function index()
    {
        return view('admin/product');
    }

    public function store()
    {
        $productModel = new ProductModel();

        // handle image upload
        $file = $this->request->getFile('image');

        $imageName = '';

        if ($file && $file->isValid()) {
            $imageName = $file->getName();
        }

        $data = [
            'image'  => $imageName,
            'name'   => $this->request->getPost('name'),
            'category'   => $this->request->getPost('category'),
            'price'  => $this->request->getPost('price'),
            'stock'  => $this->request->getPost('stock'),
            'status' => $this->request->getPost('status'),
        ];

        $productModel->insert($data);

        return redirect()->to('admin/list');
    }

    public function list()
    {
        // create object
        $productModel = new ProductModel();

        // Select * from  query 
        $data['products'] = $productModel->findAll();

        return view('admin/list', $data);
    }

    public function edit($id)   //edit page 
    {
        $productModel = new ProductModel();

        $data['product'] = $productModel->find($id);

        return view('admin/edit_product', $data);
    }
    public function update($id)  //update button 
    {
        // create object
        $productModel = new ProductModel();


        $data = [
            'name' => $this->request->getPost('name'),
            'category' => $this->request->getPost('category'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
            'status' => $this->request->getPost('status'),
        ];
        $file = $this->request->getFile('image');

        if ($file && $file->isValid()) {
            $imageName = $file->getName();

            $data['image'] = $imageName;
        }

        $productModel->update($id, $data);

        return redirect()->to('admin/list');
    }

    public function delete($id)
    {
        $productModel = new ProductModel();

        $product = $productModel->find($id);

        if ($product && !empty($product['image'])) {

            $imagePath = FCPATH . 'uploads/products/' . $product['image'];

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $productModel->delete($id);

        return redirect()->to(base_url('admin/list'));
    }
}
