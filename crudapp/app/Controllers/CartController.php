<?php

namespace  App\Controllers;

// use product model 
use   App\Models\ProductModel;


class CartController extends BaseController
{

    // This function runs when the user clicks Add to Cart.
    public function add($id)
    {
        // A session stores temporary data for a particular user.
        $_session = session();

        // create object 
        $productModel = new ProductModel();

        //Find Product
        $products = $productModel->find($id);


        // if not get 
        if (!$products) {
            return redirect()->back()->with('error', 'Product Not Found');
        }

        //Get Existing Cart

        $cart = $_session->get('cart') ?? [];

        // Check Product Already Exists
        if (isset($cart[$id])) {
            // add qty 
            $cart[$id]['qty']++;
        } else {
            // Creates a new array.
            //stores in that 
            $cart[$id] = [
                'id' => $products['id'],
                'name' => $products['name'],
                'price' => $products['price'],
                'image' => $products['image'],
                'qty' => 1
            ];
        }
        //Save Cart
        $_session->set('cart', $cart);

        return redirect()->back()->with('success', 'Product added to cart');
    }


    public function increase($id)
    {
        $session = session();

        $cart = $session->get('cart') ??  [];

        if (isset($cart[$id])) {
            $cart[$id]['qty']++;
        }
        $session->set('cart', $cart);

        return redirect()->to('/cart');
    }

    public function decrease($id)
    {
        $session = session();
        $cart = $session->get('cart') ?? [];

        if (isset($cart[$id])) {

            if ($cart[$id]['qty'] > 1) {
                $cart[$id]['qty']--;
            } else {
                unset($cart[$id]);   // Remove product if qty becomes 0
            }
        }

        $session->set('cart', $cart);

        return redirect()->to('/cart');
    }

    public function remove($id)
    {
        // get session 
        $session= session();

        // get cart from session 
        $cart = session()->get('cart') ?? [];

        // check if product exists or not 
        if(isset($cart[$id])) 
            {
                // remove it 
           unset($cart[$id]);  

            }
            $session->set('cart',$cart);

            return redirect()->to('cart');
    }

    public function index()
    {
        $cart = session()->get('cart') ?? [];

        return view('Frontend/cart', ['cart' => $cart]);
    }
}
