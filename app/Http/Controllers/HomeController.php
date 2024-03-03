<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\User;

use App\Models\product;

use App\Models\cart;

use App\Models\order;

class HomeController extends Controller
{
    public function index()
    {
        $products = product::paginate(10);
        return view('welcome',compact('products'));
    }
    public function redirect(Request $request)
{
    // Check if user is authenticated
    if (Auth::check()) {
        $usertype = Auth::user()->usertype;
        if ($usertype ==='1') {
            return view('admin.home');
        } else {
            $products = product::paginate(4);
            return view('welcome',compact('products'));      
          }
    } else {
        // Handle case when user is not authenticated
        // For example, redirect to login page
        return redirect()->route('login');
    }
}

public function product_details($id)
{
    $product = product::find($id);
    return view('home.product_details',compact('product'));

}
public function add_cart(Request $request, $id)
{
    if(Auth::id()){
        $user=Auth::user();
        $product = product::find($id);
        $cart = new cart;
        $cart->name = Auth::user()->name;
        $cart->email = Auth::user()->email;
        $cart->phone = Auth::user()->phone;
        $cart->address = Auth::user()->address;
        $cart->product_title = $product->title;
        if($product->discount_price!=null){
            $cart->price = $product->discount_price * request('quantity');
        }
        else{
            $cart->price = $product->price * request('quantity');

        }
        $cart->quantity = request('quantity');
        $cart->image = $product->image;
        $cart->user_id = Auth::id();
        $cart->product_id = $product->id;
        $cart->save();
        return redirect()->back();
    }
    else{
        return redirect()->route('login');
    }
}
public function show_cart()
{
    $carts = cart::where('user_id',Auth::id())->get();
    return view('home.show_cart',compact('carts'));
}
public function delete_cart($id)
{
    $cart = cart::find($id);
    $cart->delete();
    return redirect()->back();
}
public function shop() 
{
    $products = product::paginate(10);

    return view('home.shop',compact('products'));
}
public function about() 
{

    return view('home.about');
}
public function contact() 
{
    return view('home.contact');
}
public function cash_order() 
{
    $carts = cart::where('user_id',Auth::id())->get();
    foreach($carts as $cart){
        $order = new order;
        $order->name = Auth::user()->name;
        $order->email = Auth::user()->email;
        $order->phone = Auth::user()->phone;
        $order->address = Auth::user()->address;
        $order->product_title = $cart->product_title;
        $order->price = $cart->price;
        $order->quantity = $cart->quantity;
        $order->image = $cart->image;
        $order->user_id = Auth::id();
        $order->product_id = $cart->product_id;
        $order->payment_status = 'pending';
        $order->delivery_status = 'pending';
        $order->save();
        $cart->delete();
    }
    return redirect()->back()->with('message','Order Placed Successfully, We Will Contact You Soon');
}
public function mpesa()
{
    $cart = Cart::where('user_id', Auth::id())->get();
    // $total_price = 0;

    // // Loop through each item in the cart and calculate the total price
    // foreach ($cart->price as $item) {
    //     $total_price += $item->price * $item->quantity;
    // }

    return view('daraja.index', compact('cart'));
}
}


// Path: resources/views/admin/home.blade.php
