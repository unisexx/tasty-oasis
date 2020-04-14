<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ProductReview;

class ProductReviewController extends Controller
{
    public function index()
    {
        $product_reviews = ProductReview::where('status', 1)->orderBy('id','desc')->paginate(3);
        return view('product-review', compact('product_reviews'));
    }

    public function detail($id)
    {
        $product_review = ProductReview::findOrFail($id);
        return view('product-review-detail', compact('product_review'));
    }
}
