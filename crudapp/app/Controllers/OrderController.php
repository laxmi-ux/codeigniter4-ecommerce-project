<?php

namespace App\Controllers;

use App\Models\OrderItemModel;
use App\Models\OrderModel;
use App\Models\RegisterModel;

class OrderController extends BaseController
{
    public function index()
    {
        $model = new OrderModel();

        $data['orders'] = $model
            ->orderBy('order_id', 'DESC')
            ->findAll();

        return view('admin/order', $data);
    }

    public function invoice($orderId)
    {
        $orderModel = new OrderModel();
        $orderItemModel = new OrderItemModel();

        $data['order'] = $orderModel
            ->where('order_id', $orderId)
            ->first();


        $data['items'] = $orderItemModel
            ->select('order_items.*, product.name AS product_name')
            ->join('product', 'product.id = order_items.product_id')
            ->where('order_items.order_id', $orderId)
            ->findAll();
        return view('admin/invoice', $data);
    }



    public function details($id)
    {
        $model = new \App\Models\OrderModel();
        $order = new \App\Models\OrderItemModel();

        $data['orders'] = $model
            ->select('orders.*, customer.first_name, customer.last_name, customer.email, customer.address,customer.pincode,customer.state,customer.city,customer.country, customer.phone')
            ->join('customer', 'customer.id = orders.customer_id')

            ->where('orders.order_id', $id)
            ->first();

        $data['items'] = $order
            ->select('order_items.*, product.name')
            ->join('product ', 'product.id = order_items.product_id')
            ->where('order_items.order_id', $id)
            ->findAll();


        return view('admin/order_details', $data);
    }
    public function edit($id)
    {
        $model = new OrderModel();

        $data['orders'] = $model->find($id);

        return view('admin/edit_orders', $data);
    }


    public function update($id)
    {
        $model = new OrderModel();

        $model->update($id, [
            'order_status' => $this->request->getPost('order_status'),
            'payment_status' => $this->request->getPost('payment_status')
        ]);

        return redirect()->to('admin/order');
    }

    public function delete($id)
    {
        $model = new OrderModel();

        $model->delete($id);

        return redirect()->to('admin/order');
    }
}
