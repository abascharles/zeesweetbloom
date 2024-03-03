<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\category;

use App\Models\product;
class AdminController extends Controller
{
    public function view_category()
    {   
        $data = Category::all();
        return view('admin.view_category',compact('data'));
    }
    public function add_category(Request $request)
    {
        $data = new Category;
        $data->category_name = $request->category_name;
        $data->save();
        return redirect()->back()->with('message', 'Category Added Successfully');
    }
    public function delete_category($id)
    {
        $data = Category::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Category Deleted Successfully');
    }
    public function view_product()
    {
        $category = Category::all();
        return view('admin.view_product',compact('category'));
    }
    public function add_product(Request $request)
    {
        $data = new Product;
    
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->discount_price = $request->discount_price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
    
        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('product_images', $image_name); // Store the uploaded file
            $data->image = $image_name;
        }
    
        $data->save();
    
        return redirect()->back()->with('message', 'Product Added Successfully');
    }
    public function show_product()
    {
        $data = Product::all();
        return view('admin.show_product',compact('data'));
    }

    public function delete_product($id)
    {
        $data = Product::find($id);
        $data->delete();
        return redirect()->back()->with('message', 'Product Deleted Successfully');
    }
    public function edit_product($id)
    {
        $data = Product::find($id);
        $category = Category::all();
        return view('admin.edit_product',compact('data','category'));
    }
    
    public function edit_product_confirm(Request $request, $id)
    {
        $data = Product::find($id);
    
        $data->title = $request->title;
        $data->description = $request->description;
        $data->price = $request->price;
        $data->discount_price = $request->discount_price;
        $data->quantity = $request->quantity;
        $data->category = $request->category;
    
        // Handle file upload
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image_name = time().'.'.$image->getClientOriginalExtension();
            $image->move('product_images', $image_name); // Store the uploaded file
            $data->image = $image_name;
        }
    
        $data->save();
    
        return redirect()->back()->with('message', 'Product Edited Successfully');
    }
}
    