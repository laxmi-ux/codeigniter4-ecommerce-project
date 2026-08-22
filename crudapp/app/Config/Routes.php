<?php

use App\Controllers\CartController;
use CodeIgniter\Router\RouteCollection;

/** @var RouteCollection $routes */
$routes->get('/', 'Home::index');


// Frontend Side
$routes->get('home', 'IndexController::index');
$routes->get('Frontend', 'IndexController::index');


//  Customer Register
$routes->get('register', 'RegisterController::index');
$routes->post('register/store', 'RegisterController::store');


// Customer Login
$routes->get('login', 'CustomerLoginController::index');
$routes->post('login/check', 'CustomerLoginController::check');
$routes->get('logout', 'CustomerLoginController::logout');


// Customer Dashboard 
$routes->get('customer/dashboard', 'CustomerDashboardController::index');
$routes->get('customer/profile', 'CustomerDashboardController::profile');
$routes->get('customer/orders', 'CustomerDashboardController::orders');
$routes->get('customer/order/(:num)', 'CustomerDashboardController::orderDetails/$1');

$routes->get('customer/edit-profile', 'CustomerDashboardController::editProfile');
$routes->post('customer/update-profile', 'CustomerDashboardController::updateProfile');

// Change Password
$routes->get('customer/change_password', 'CustomerDashboardController::changePassword');
$routes->post('customer/update_password', 'CustomerDashboardController::updatePassword');

// Customer can add address 
$routes->get('customer/address', 'CustomerDashboardController::address');
$routes->get('customer/add-address', 'CustomerDashboardController::addAddress');
$routes->post('customer/save-address', 'CustomerDashboardController::saveAddress');
$routes->get('customer/edit-address/(:num)', 'CustomerDashboardController::editAddress/$1');
$routes->post('customer/update-address/(:num)', 'CustomerDashboardController::updateAddress/$1');
$routes->get('customer/delete-address/(:num)', 'CustomerDashboardController::deleteAddress/$1');

// product
$routes->get('shop', 'ShopController::index');


//   category connection 
$routes->get('category/(:num)', 'IndexController::category/$1');


// view product details connection 
$routes->get('product/(:num)', 'ShopController::productDetails/$1');

// Cart page


$routes->get('cart', 'CartController::index');
$routes->get('cart/add/(:num)', 'CartController::add/$1');
$routes->get('cart/increase/(:num)', 'CartController::increase/$1');
$routes->get('cart/decrease/(:num)', 'CartController::decrease/$1');
$routes->get('cart/remove/(:num)', 'CartController::remove/$1');



// checkout page
$routes->get('checkout', 'CheckoutController::index');
$routes->post('get-tax', 'CheckoutController::getTax');

$routes->post('placeOrder', 'CheckoutController::placeOrder');

$routes->get('upi', 'CheckoutController::upi');
$routes->post('upi/pay', 'CheckoutController::upiPay');
$routes->get('card', 'CheckoutController::card');
// for card 
$routes->post('card/pay', 'CheckoutController::cardPay');
$routes->get('order-success', 'CheckoutController::orderSuccess');

$routes->get('buy-now/(:num)', 'CheckoutController::buyNow/$1');

//Invoice Part

$routes->get('Invoice/(:num)', 'InvoiceController::view/$1');

// View Order 
$routes->get('view_order/(:num)', 'InvoiceController::getInvoice/$1');


// Admin Side
$routes->get('admin/login', 'LoginController::login');
$routes->post('checkLogin', 'LoginController::checkLogin');


// Dashboard
$routes->get('admin/dashboard', 'DashboardController::index');

// Admin Profile 
$routes->get('admin/profile', 'AdminController::profile');
// admin can update it profile 
$routes->post('admin/updateProfile', 'AdminController::updateProfile');


//Admin Invoice 
$routes->get('admin/invoice/(:num)', 'OrderController::invoice/$1');

// Product 
$routes->get('admin/product', 'ProductController::index');
// Save Product
$routes->post('admin/product/store', 'ProductController::store');
// View Product List
$routes->get('admin/list', 'ProductController::list');
// Edit Product
$routes->get('admin/product/edit/(:num)', 'ProductController::edit/$1');
// Update Product
$routes->post('admin/product/update/(:num)', 'ProductController::update/$1');
// Delete Product
$routes->get('admin/product/delete/(:num)', 'ProductController::delete/$1');


// Catergory 
$routes->get('admin/category', 'CategoryController::index');
// Save category
$routes->post('admin/category/store', 'CategoryController::store');
// View Category View
$routes->get('admin/catManage', 'CategoryController::catManage');
// Edit Category
$routes->get('admin/category/edit/(:num)', 'CategoryController::edit/$1');
// Update Category
$routes->post('admin/category/update/(:num)', 'CategoryController::update/$1');
// Delete Category
$routes->get('admin/category/delete/(:num)', 'CategoryController::delete/$1');


// Customer
$routes->get('admin/customer', 'CustomerController::index');

// View Customer 
$routes->get('admin/customer', 'CustomerController::customer');
// Edit Customer
$routes->get('admin/customer/edit/(:num)', 'CustomerController::edit/$1');
// Update Customer
$routes->post('admin/customer/update/(:num)', 'CustomerController::update/$1');
// Delete Customer
$routes->get('admin/customer/delete/(:num)', 'CustomerController::delete/$1');

// Order 
$routes->get('admin/order', 'OrderController::index');
// View Order 
$routes->get('admin/order/view/(:num)', 'OrderController::view/$1');
// Order details 
$routes->get('admin/order/details/(:num)', 'OrderController::details/$1');
// edit order 
$routes->get('admin/order/edit/(:num)', 'OrderController::edit/$1');
// update order after edit 
$routes->post('admin/order/update/(:num)', 'OrderController::update/$1');
// delete order 
$routes->get('admin/order/delete/(:num)', 'OrderController::delete/$1');


// Reports 
$routes->get('admin/reports', 'ReportController::index');


$routes->get('test', function () {
    return 'Route Working';
});
