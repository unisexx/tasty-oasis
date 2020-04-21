<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Promotion;
use App;

class PromotionController extends Controller
{
    public function index(){
        $promotions = Promotion::with('translations')->where('status', 1)->orderBy('id','desc')->paginate(6);
        return view('promotion', compact('promotions'));
    }

    public function detail($id)
    {
        $promotion = Promotion::findOrFail($id)->translate(App::getLocale());
        return view('promotion-detail', compact('promotion'));
    }
}
