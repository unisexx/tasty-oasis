<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductCategory;
use App\Product;

class ProductController extends Controller
{
    public function index(){
        $products = Product::where('status', 1)->orderBy('id','desc')->paginate(3);
        return view('product', compact('products'));
    }

    public function category($id)
    {
        $product_category = ProductCategory::findOrFail($id);
        $products = Product::where('product_category_id', $id)->where('status', 1)->orderBy('id','desc')->paginate(3);
        return view('product-category', compact('product_category', 'products'));
    }
}
