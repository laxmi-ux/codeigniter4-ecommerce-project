<?php

namespace App\Controllers;

use App\Models\CustomerModel;
use App\Models\OrderModel;
use App\Models\RegisterModel;
use App\Models\AddressModel;


class CustomerDashboardController extends BaseController
{
    public function index()
    {
        $customerId = session()->get('customer_id');

        if (!$customerId) {
            return redirect()->to('/login');
        }

        $orderModel = new OrderModel();
        $customerModel = new CustomerModel();
        $addressModel = new AddressModel();


        $data['customer'] = $customerModel->find($customerId);

        $data['totalOrders'] = $orderModel
            ->where('customer_id', $customerId)
            ->countAllResults();


        $data['orders'] = $orderModel
            ->where('customer_id', $customerId)
            ->orderBy('order_id', 'DESC')
            ->findAll();


        $data['totalAddresses'] = $addressModel
            ->where('customer_id', $customerId)
            ->countAllResults();


        return view('Frontend/customer/dashboard', $data);
    }

    public function profile()
    {
        $customerId = session()->get('customer_id');

        $customerModel = new RegisterModel();

        $data['customer'] = $customerModel->find($customerId);

        return view('Frontend/customer/profile', $data);
    }

    public function orders()
    {
        $customerId = session()->get('customer_id');

        $orderModel = new OrderModel();

        $data['orders'] = $orderModel
            ->where('customer_id', $customerId)
            ->orderBy('order_id', 'DESC')
            ->findAll();

        return view('Frontend/customer/orders', $data);
    }

    public function editProfile()
    {
        $customerId = session()->get('customer_id');

        if (!$customerId) {
            return redirect()->to('/login');
        }

        $customerModel = new \App\Models\RegisterModel();

        $data['customer'] = $customerModel->find($customerId);

        return view('Frontend/customer/edit_profile', $data);
    }

    public function updateProfile()
    {
        $customerId = session()->get('customer_id');

        $customerModel = new \App\Models\RegisterModel();

        $customerModel->update($customerId, [
            'first_name' => $this->request->getPost('first_name'),
            'last_name'  => $this->request->getPost('last_name'),
            'email'      => $this->request->getPost('email'),
            'phone'      => $this->request->getPost('phone'),
            'address'    => $this->request->getPost('address'),
            'city'       => $this->request->getPost('city'),
            'state'      => $this->request->getPost('state'),
            'pincode'    => $this->request->getPost('pincode'),
            'country'    => $this->request->getPost('country'),
        ]);

        return redirect()->to('customer/profile')->with('success', 'Profile updated successfully.');
    }

    public function address()
    {
        $customerId = session()->get('customer_id');

        $addressModel = new AddressModel();

        $data['addresses'] = $addressModel->where('customer_id', $customerId)
            ->findAll();

        return view('Frontend/customer/address', $data);
    }

    public function addAddress()
    {
        return view('Frontend/customer/add_address');
    }

    public function saveAddress()
    {
        $addressModel = new AddressModel();

        $addressModel->insert([
            //session used for temp 
            'customer_id' => session()->get('customer_id'),
            'full_name' => $this->request->getPost('full_name'),
            'phone' => $this->request->getPost('phone'),
            'address' => $this->request->getPost('address'),
            'city' => $this->request->getPost('city'),
            'state' => $this->request->getPost('state'),
            'pincode' => $this->request->getPost('pincode'),
            'country' => $this->request->getPost('country')
        ]);

        return redirect()->to('customer/address');
    }

    public function editAddress($id)
    {
        $addressModel = new \App\Models\AddressModel();

        $data['address'] = $addressModel->find($id);

        return view('Frontend/customer/edit_address', $data);
    }
    public function updateAddress($id)
    {
        $addressModel = new \App\Models\AddressModel();

        $addressModel->update($id, [
            'full_name' => $this->request->getPost('full_name'),
            'phone'     => $this->request->getPost('phone'),
            'address'   => $this->request->getPost('address'),
            'city'      => $this->request->getPost('city'),
            'state'     => $this->request->getPost('state'),
            'pincode'   => $this->request->getPost('pincode'),
            'country'   => $this->request->getPost('country')
        ]);

        return redirect()->to('customer/address');
    }
    public function deleteAddress($id)
    {
        $addressModel = new \App\Models\AddressModel();

        $addressModel->delete($id);

        return redirect()->to('customer/address');
    }

    public function changePassword()
    {
        return view('Frontend/customer/change_password');
    }

    public function updatePassword()
    {
        // customer ki id lugi jo logged in hai 
        $customerId = session()->get('customer_id');

        // form ka data 
        $currentPassword = $this->request->getPost('current_password');
        $newPassword = $this->request->getPost('new_password');
        $confirmPassword = $this->request->getPost('confirm_password');

        //  load model 
        $customerModel = new RegisterModel();


        // customer ka record lege 
        $customer = $customerModel->find($customerId);

        // checked current password
        if (! password_verify($currentPassword, $customer['password'])) {

            // sahi  h ihai tho show this line        
            return redirect()->back()->with('error', 'Current password is incorrect');
        }

        // checked new password and confirm password same hai kya 
        if ($newPassword !== $confirmPassword) {
            // nhi hai tho yeh exceute karega 
            return redirect()->back()->with('error', 'Passwords do not match');
        }

        // then for new password update karne k liye 
        // logged in customer ka password update karega 
        $customerModel->update($customerId, [
            // and it store in hashed password
            'password' => password_hash($newPassword, PASSWORD_DEFAULT)
        ]);
        

        return redirect()->back()->with('success', 'Password updated successfully');
    }
}
