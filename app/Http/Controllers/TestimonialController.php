<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Testimonial;
use App;

class TestimonialController extends Controller
{
    public function index()
    {
        // select เอาเฉพาะที่มีตามภาษาของตัวเอง
        // $testimonials = Testimonial::with('translations')->where('status', 1)->whereTranslation('name', '!=', '', [App::getLocale()])->orderBy('id','desc')->paginate(8);

        $testimonials = Testimonial::with('translations')->where('status', 1)->orderBy('id','desc')->paginate(8);
        return view('testimonial', compact('testimonials'));
    }
}
