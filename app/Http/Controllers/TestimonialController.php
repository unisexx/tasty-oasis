<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonials = Testimonial::where('status', 1)->orderBy('id','desc')->paginate(8);
        return view('testimonial', compact('testimonials'));
    }
}
