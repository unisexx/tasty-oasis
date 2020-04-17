<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductReviewController extends Controller
{
    public function index()
    {
        $products = Product::where('status', 1)->whereNotNull('review')->orderBy('id','desc')->paginate(3);
        return view('product-review', compact('products'));
    }

    public function detail($id)
    {
        $product = Product::findOrFail($id);
        return view('product-review-detail', compact('product'));
    }
}
