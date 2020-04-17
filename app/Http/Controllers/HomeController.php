<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hilight;
use App\Testimonial;
use App\Doctor;
use App\Product;

class HomeController extends Controller
{
    public function index()
    {
        $hilights = Hilight::where('status', 1)->orderBy('id', 'desc')->get();
        $products = Product::where('status', 1)->orderBy('id', 'desc')->take(3)->get();
        $testimonials = Testimonial::where('status', 1)->orderBy('id', 'desc')->take(3)->get();
        $doctor = Doctor::where('status', 1)->orderBy('id', 'desc')->firstOrFail();
        
        return view('home', compact('hilights', 'products', 'testimonials', 'doctor'));
    }
}
