<?php

namespace App\Controllers;

use App\Models\LoginModel;

class LoginController extends BaseController
{
    public function login()
    {
        return view('admin/login');
    }

    // first insert it 
    //         public function createAdmin()
    // {
    //     $model = new LoginModel();

    //     $model->insert([
    //         'username' => 'admin',
    //         'password' => password_hash('12345', PASSWORD_DEFAULT)
    //     ]);

    //     echo "Admin Created Successfully";
    // }

    public function checkLogin()
    {
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $model = new LoginModel();

        $admin = $model->where('username', $username)->first();


        if ($admin && password_verify($password, $admin['password'])) {


            session()->set('admin_id', $admin['id']);
            session()->set('admin_name', $admin['username']);

            return redirect()->to('admin/dashboard');
        } else {
            echo "Invalid Username or Password";
        }
    }

    public function dashboard()
    {
        if (!session()->get('admin_id')) {
            return redirect()->to('admin/login');
        }
        return view('admin/dashboard');
    }
}
