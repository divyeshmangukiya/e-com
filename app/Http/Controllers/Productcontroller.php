<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\support\Facades\db;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class Productcontroller extends Controller
{
    function index()
    {
        $data = Product::all();

        return view('product', ['products' => $data]);
    }

    function detail($id)
    {
        $data = Product::find($id);
        return view('detail', ['products' => $data]);
    }

    function search(Request $req)
    {
        $data = Product::where('name', 'like', '%' . $req->input('query') . '%')->get();
        return view('search', ['products' => $data]);
    }


    function addtocart(Request $req)
    {
        if ($req->session()->has('user')) {
            $cart = new Cart;
            $cart->user_id = $req->session()->get('user')['id'];
            $cart->product_id = $req->product_id;
            $cart->save();
            return redirect('/');
        } else {
            return redirect('/login');
        }
    }


    function cartlist(Request $req)
    {
        $user_id = Session::get('user')['id'] ?? '1';

        $data = db::table('cart')->join('products', 'cart.product_id', 'products.id')->select('products.*', 'cart.id as cart_id')->where('cart.user_id', $user_id)->get();

        return view('cartlist', ['products' => $data]);
    }

    function removecart($id)
    {
        Cart::destroy($id);
        return redirect('cartlist');
    }

    function ordernow()
    {
        $user_id = Session::get('user')['id'] ?? '1';

        $total = DB::table('cart')->join('products', 'cart.product_id', 'products.id')->select('products.*', 'cart.id as cart_id')->where('cart.user_id', $user_id)->sum('products.price');

        return view('ordernow', ['total' => $total]);
    }

    function orderplace(Request $req)

    {

        $user_id = Session::get('user')['id'] ?? '1';
        $allcart = Cart::where('user_id', $user_id)->get();
        foreach ($allcart as $cart) {

            $order = new order;
            $order->product_id = $cart['product_id'];
            $order->user_id = $cart['user_id'];
            $order->status = 'pending';
            $order->payment_method = $req->payment;
            $order->address = $req->address;
            $order->payment_status = "pending";
            $order->save();
        }

        Cart::where('user_id',$user_id)->delete();
        return redirect('/');        // return $req->input();
    }
}
