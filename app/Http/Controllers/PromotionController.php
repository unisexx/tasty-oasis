<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;

class PromotionController extends Controller
{
    public function index(){
        $promotions = Promotion::where('status', 1)->orderBy('id','desc')->paginate(6);
        return view('promotion', compact('promotions'));
    }

    public function detail($id)
    {
        $promotion = Promotion::findOrFail($id);
        return view('promotion-detail', compact('promotion'));
    }
}
