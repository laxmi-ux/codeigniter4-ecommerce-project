<?php 

// Think of a namespace like an address.
// This helps CodeIgniter find the controller.
namespace App\Controllers;

// Imagine your controller wants to use AdminModel.
use App\Models\AdminModel;

// AdminController inherits common functionality from BaseController.
class AdminController extends BaseController
{

//  function runs 
  public function profile()
  {
    // Create Model Object
    $adminModel = new  AdminModel();

    // Fetch Data
    $data['admin'] = $adminModel->find(2);

    // Load View
    return view('admin/profile', $data);
  }

  // function runs 
  public function updateProfile()
  {
    // create model object 
      $adminModel = new AdminModel();

      // Read Form Data users >> typed >> change >> give data 
      $data = [
        'name' => $this->request->getPost('name'),
        'email' => $this->request->getPost('email'),
        'phone' => $this->request->getPost('phone'),
        'username' => $this->request->getPost('username'),
      ];

      // New password 
      if($this->request->getPost('password') != '') {
        $data['password'] = password_hash(
          $this-> request->getPost('password'),
          PASSWORD_DEFAULT
        );
      }

      // update database 
      $adminModel->update(2,$data);
       
      // Redirect
      return redirect()->to ('admin/profile');
  }
}