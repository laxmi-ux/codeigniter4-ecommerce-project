<?php

namespace App\Controllers;



class ReportController extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $data['sales'] = $db->query("SELECT SUM(total_amount) AS total FROM orders WHERE payment_status='Paid'")->getRow();

        $data['orders'] = $db->query("SELECT COUNT(*) AS total FROM orders")->getRow();

        $data['customer'] = $db->query("SELECT COUNT(*) AS total FROM customer")->getRow();

        $data['product'] = $db->query("SELECT COUNT(*) AS total FROM product")->getRow();

        $data['pending'] = $db->table('orders')->where('order_status', 'Pending')->countAllResults();

        $data['processing'] = $db->table('orders')->where('order_status', 'Processing')->countAllResults();

        $data['shipped'] = $db->table('orders')->where('order_status', 'Shipped')->countAllResults();

        $data['delivered'] = $db->table('orders')->where('order_status', 'Delivered')->countAllResults();

        $data['cancelled'] = $db->table('orders')->where('order_status', 'Cancelled')->countAllResults();

        return view('admin/reports', $data);
    }
}
