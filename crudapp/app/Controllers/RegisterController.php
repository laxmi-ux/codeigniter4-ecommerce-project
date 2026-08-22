<?php

namespace App\Controllers;

use App\Models\RegisterModel;

class RegisterController extends BaseController
{
    public function index()
    {
        $customerModel = new RegisterModel();

        $data['customer'] = $customerModel->findAll();

        return view('Frontend/register', $data);
    }


    public function store()
    {
        $model = new RegisterModel();

        $data = [
            'first_name'     => $this->request->getPost('first_name'),
            'last_name'      => $this->request->getPost('last_name'),
            'email'          => $this->request->getPost('email'),
            'password'       => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT),
            'phone'          => $this->request->getPost('phone'),
            'gender'         => $this->request->getPost('gender'),
            'date_of_birth'  => $this->request->getPost('date_of_birth'),
            'address'        => $this->request->getPost('address'),
            'city'           => $this->request->getPost('city'),
            'state'          => $this->request->getPost('state'),
            'pincode'        => $this->request->getPost('pincode'),
            'country'        => $this->request->getPost('country'),
            'status'         => 'Active'
        ];

        $model->insert($data);

        return redirect()->to('/login');
    }
}   
