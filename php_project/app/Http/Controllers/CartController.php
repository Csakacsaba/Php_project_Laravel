<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $userId = Auth::user()->id;
        $cart = Cart::where('user_id', $userId)->get();
        $totalPrice = $cart->sum('price');
        return view('home.cart', compact('cart', 'totalPrice'));
    }

    public function add_cart(Request $request, $id)
    {
        if (Auth::id()) {

            $user = Auth::user();
            $product = Product::find($id);

            $cart = Cart::where('User_id', $user->id)->where('Product_id', $product->id)->first();


            if (!$cart){
                if ($product->quantity >= $request->quantity) {
                    $cart = new Cart;
                    $cart->name = $user->name;
                    $cart->email = $user->email;
                    $cart->phone = $user->phone;
                    $cart->address = $user->address;
                    $cart->quantity = $request->quantity;
                    $cart->user_id = $user->id;
                    $cart->product_title = $product->title;

                    if ($product->discount!=NULL){
                        $cart->price = $product->discount * $request->quantity;
                    }
                    else {
                        $cart->price = $product->price * $request->quantity;
                    }

                    $cart->image = $product->image;
                    $cart->product_id = $product->id;
                    $cart->save();
                    return redirect()->back()->with('message', "Product added (".$product->title.")");
                } else {
                    return redirect()->back()->with('message', 'There are only ' . $product->quantity . ' ' . $product->title . ' ' . ' in stock. Please choose fewer quantities.');
                }
            } else {
                if ($product->quantity >= $request->quantity) {
                    $cart->quantity += $request->quantity;
                    $cart->price = ($product->discount != null) ? $product->discount * $cart->quantity : $product->price * $cart->quantity;
                    $cart->save();
                    return redirect()->back()->with('message', "Product quantity updated (" . $product->title . ")");
                }else {
                    return redirect()->back()->with('message', 'There are only ' . $product->quantity . ' ' . $product->title . ' ' . ' in stock. Please choose fewer quantities.');
                }
            }
        } else {
            return redirect('login');
        }
    }

    public function delete_from_cart($id)
    {
        $cart=cart::find($id);
        $cart->delete();
        return redirect()->back();
    }
}
