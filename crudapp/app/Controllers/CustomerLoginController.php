<?php

namespace App\Controllers;

use App\Models\RegisterModel;

class CustomerLoginController extends BaseController
{
    public function index()
    {
        return view('Frontend/login');
    }

    public function check()
    {
        // store value temp
        $session = session();

        $model = new RegisterModel();

        // get email and password
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        // Find Customer by email 
        $customer = $model->where('email', $email)->first();

        if ($customer) {
            if (password_verify($password, $customer['password'])) {
                $session->set([
                    'customer_id' => $customer['id'],
                    'customer_name' => $customer['first_name'],
                    'customer_email' => $customer['email'],
                    'isLoggedIn' => true
                ]);

                   return redirect()->to('home');
            }
            else {
                return redirect()->back()->with('error', 'Incorrect password.');
            }
        } else {
            return redirect()->back()->with('error','Email not found');
        }
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}
