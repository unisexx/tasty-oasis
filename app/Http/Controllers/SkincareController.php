<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SkincareCategory;
use App\Skincare;

class SkincareController extends Controller
{
    public function index(){
        $skincare_categories = SkincareCategory::orderBy('order','asc')->paginate(3);
        return view('skincare', compact('skincare_categories'));
    }

    public function category($id)
    {
        $skincare_category = SkincareCategory::findOrFail($id);
        $skincares = Skincare::where('skincare_category_id', $id)->where('status', 1)->orderBy('id','desc')->paginate(3);
        return view('skincare-category', compact('skincare_category', 'skincares'));
    }

    public function detail($id)
    {
        $skincare = Skincare::findOrFail($id);
        return view('skincare-detail', compact('skincare'));
    }
}
