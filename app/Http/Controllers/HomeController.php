<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hilight;
use App\Testimonial;
use App\Doctor;
use App\Product;
use App;

class HomeController extends Controller
{
    public function index()
    {
        $hilights = Hilight::where('status', 1)->orderBy('order', 'asc')->get();
        $products = Product::where('status', 1)->orderBy('id', 'desc')->take(3)->get()->translate(App::getLocale());
        $testimonials = Testimonial::where('status', 1)->orderBy('id', 'desc')->take(3)->get()->translate(App::getLocale());
        $doctor = Doctor::where('status', 1)->orderBy('id', 'desc')->firstOrFail()->translate(App::getLocale());
        
        return view('home', compact('hilights', 'products', 'testimonials', 'doctor'));
    }
}
