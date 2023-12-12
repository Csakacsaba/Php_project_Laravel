<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $products = Product::paginate(3);
        return view('home.home', compact('products'));
    }

    public function shop()
    {
        $categories = Category::all();
        $products = Product::all();
        return view('home.shop' ,compact('products', 'categories'));
    }
}
