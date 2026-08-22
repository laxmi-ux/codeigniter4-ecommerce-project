<?php

namespace App\Controllers;

use App\Models\CustomerModel;

class CustomerController extends BaseController
{
public function index()
    {
        $customerModel = new CustomerModel();

        $data['customer'] = $customerModel->findAll();

        return view('admin/customer', $data);
    }


    public function store()
    {
        $customerModel = new CustomerModel();


        $data = [
            'first_name'   => $this->request->getPost('first_name'),
            'last_name'   => $this->request->getPost('last_name'),
            'email'   => $this->request->getPost('email'),
            'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'phone' => $this->request->getPost('phone'),
            'gender'  => $this->request->getPost('gender'),
            'date_of_birth'  => $this->request->getPost('date_of_birth'),
            'address'  => $this->request->getPost('address'),
            'city'  => $this->request->getPost('city'),
            'state'  => $this->request->getPost('state'),
            'pincode'  => $this->request->getPost('pincode'),
            'country'  => $this->request->getPost('country'),
            'status' => $this->request->getPost('status'),

        ];

        $customerModel->insert($data);

        return redirect()->to('home');
    }


   
    public function customer()
    {
        // create object
        $customerModel = new CustomerModel();

        // Select * from  query 
        $data['customer'] = $customerModel->findAll();

        return view('admin/customer', $data);
    }

    public function edit($id)   //edit page 
    {
        $customerModel = new CustomerModel();

        $data['customer'] = $customerModel->find($id);

        return view('admin/edit_customer', $data);
    }
    public function update($id)  //update button 
    {
        // create object
        $customerModel = new CustomerModel();


        $data = [
            'first_name'   => $this->request->getPost('first_name'),
            'last_name'   => $this->request->getPost('last_name'),
            'email'   => $this->request->getPost('email'),
            'phone' => $this->request->getPost('phone'),
            'gender'  => $this->request->getPost('gender'),
            'date_of_birth'  => $this->request->getPost('date_of_birth'),
            'address'  => $this->request->getPost('address'),
            'city'  => $this->request->getPost('city'),
            'state'  => $this->request->getPost('state'),
            'pincode'  => $this->request->getPost('pincode'),
            'country'  => $this->request->getPost('country'),
            'status' => $this->request->getPost('status'),
        ];


        $customerModel->update($id, $data);

        return redirect()->to('admin/customer');
    }

    public function delete($id)
    {
        $customerModel = new CustomerModel();
        $orderModel = new \App\Models\OrderModel();

        // Delete customer's orders
        $orderModel->where('customer_id', $id)->delete();

        // Delete customer
        $customerModel->delete($id);

        return redirect()->to(base_url('admin/customer'))
            ->with('success', 'Customer deleted successfully.');
    }
}

