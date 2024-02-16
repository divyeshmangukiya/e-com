<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Cart;

use Illuminate\Http\Request;

class Productcontroller extends Controller
{
    function index()
    {
        $data = Product::all();

        return view('product', ['products' => $data]);
    }

    function detail($id)
    {
        $data= Product::find($id);
        return view('detail', ['products' => $data]);
    }

    function search(Request $req)
    {
         $data = Product::where('name','like','%'.$req->input('query').'%')->get();
         return view('search', ['products' => $data]);
    } 
    
    function addtocart(Request $req)
    {
        \Log::info($req);
       if($req->session()->has('user')){
           $cart= new Cart;
           $cart->user_id=$req->session()->get('user')['id'];
           $cart->product_id=$req->product_id;
           $cart->save();
           return redirect('/');

       }else{
           return redirect('/login');
       }
        // return $req;
    }
}

