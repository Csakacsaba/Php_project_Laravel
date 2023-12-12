<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;

class AdminController extends Controller
{
    public function index()
    {
        $isadmin=Auth::user()->admin;



        if ($isadmin == 1) {
            return view('admin.admin');
        }else{
            return redirect('/');
        }
    }
    public function showAddCategory()
    {
        $categories = category::all();
        return view('admin.category',compact('categories'));
    }
    public function add_category(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255|unique:categories,category_name',
        ]);

        $data = Category::firstOrNew(['category_name' => $request->category]);

        if (!$data->exists) {
            $data->save();
            return redirect()->back()->with('message', 'Category added successfully');
        } else {
            return redirect()->back()->with('message', 'Category already exists');
        }
    }
    public function delete_category($id)
    {
        $data=category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category delete is sucessfully');
    }





    public function showAddProduct()
    {
        $categories = category::all();
        return view('admin.product', compact('categories'));
    }
    public function showProduct()
    {
        $products = product::all();
        return view('admin.show_product', compact('products'));
    }
    public function add_product(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'dis_price' => 'nullable|numeric|min:0',
            'category' => 'required|string|max:255',
        ]);

        $product = new product;
        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->quantity=$request->quantity;
        $product->discount=$request->dis_price;
        $product->category=$request->category;
        $image=$request->image;
        $imageName=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imageName);

        $product->image=$imageName;

        $product->save();
        return redirect()->back()->with('message', 'Product added successfully!');
    }
    public function deleteProduct($id)
    {
        $product = Product::find($id);

        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        $product->delete();

        return redirect()->back()->with('message', 'Product deleted successfully.');
    }


    public function update_product($id)
    {
        $product=product::find($id);
        $categories=category::all();

        return view('admin.update_product', compact('product', 'categories'));
    }

    public function update_product_confirm(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:0',
            'quantity' => 'required|integer|min:0',
            'dis_price' => 'nullable|numeric|min:0',
            'category' => 'required|string|max:255',
        ]);

        $product = Product::find($id);

        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->discount = $request->dis_price;
        $product->quantity = $request->quantity;
        $product->category = $request->category;

        if ($request->hasFile('image')) {
            $image = $request->image;
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product', $imageName);
            $product->image = $imageName;
        }

        $product->save();

        $products = Product::all();
        return view('admin.show_product', compact('products'));
    }
}
