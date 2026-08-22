<?php

namespace App\Controllers;

use App\Models\CategoryModel;

class CategoryController extends BaseController
{
    public function index()
    {
        return view('admin/category');
    }

    public function store()
    {
        $productModel = new CategoryModel();

        // handle image upload
        $file = $this->request->getFile('image');

        $imageName = '';

        if ($file && $file->isValid()) {
            $imageName = $file->getName();
        
        }

        $data = [
            'image'  => $imageName,
            'name'   => $this->request->getPost('name'),
            'status' => $this->request->getPost('status'),
        ];

        $productModel->insert($data);

        return redirect()->to('admin/catManage');
    }

    public function catManage()
    {
        // create object
        $categoryModel = new CategoryModel();

        // Select * from  query 
        $data['category'] = $categoryModel->findAll();

        

        return view('admin/catManage', $data);
    }

    public function edit($id)   //edit page 
    {
        $categoryModel = new CategoryModel();

        $data['category'] = $categoryModel->find($id);

        return view('admin/edit_category', $data);
    }
    public function update($id)  //update button 
    {
        // create object
        $categoryModel = new CategoryModel();

        
        $data = [
            'name' => $this->request->getPost('name'),
          
            'status' => $this->request->getPost('status'),
        ];
        $file = $this->request->getFile('image');

        if ($file && $file->isValid()) {
            $imageName = $file->getName();
          
            $data['image'] = $imageName;
        }

        $categoryModel->update($id, $data);

        return redirect()->to('admin/catManage');
    }

    public function delete($id)
    {
        $categoryModel = new CategoryModel();

        $category = $categoryModel->find($id);

        if ($category && !empty($category['image'])) {

            $imagePath = FCPATH . 'uploads/categorys/' . $category['image'];

            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        $categoryModel->delete($id);

        return redirect()->to(base_url('admin/catManage'));
    }
}
