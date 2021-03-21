<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hilight;
use App\Testimonial;
use App\Doctor;
use App\Product;
use App\Surgery;
use App\Skincare;
use App\Promotion;
use App\Article;
use App\HomeService;
use App;
use Spatie\Searchable\Search;

class HomeController extends Controller
{
    public function index()
    {
        $hilights = Hilight::where('status', 1)->orderBy('order', 'asc')->get();
        $home_service = HomeService::findOrFail(1)->translate(App::getLocale());
        $products = Product::where('status', 1)->orderBy('id', 'desc')->take(3)->get()->translate(App::getLocale());
        $testimonials = Testimonial::where('status', 1)->orderBy('id', 'desc')->take(3)->get()->translate(App::getLocale());
        $doctor = Doctor::where('status', 1)->orderBy('id', 'desc')->firstOrFail()->translate(App::getLocale());
        
        return view('home', compact('hilights', 'products', 'testimonials', 'doctor', 'home_service'));
    }

    public function search(Request $request)
    {
        $searchResults = (new Search())
            ->registerModel(Doctor::class, 'name', 'position', 'education', 'experience')
            ->registerModel(Surgery::class, 'title', 'excerpt', 'body')
            ->registerModel(Skincare::class, 'name', 'excerpt', 'body')
            ->registerModel(Promotion::class, 'title', 'body')
            ->registerModel(Product::class, 'name', 'body', 'review')
            ->registerModel(Article::class, 'title', 'excerpt', 'body')
            ->perform($request->input('search'));

        return view('search', compact('searchResults'));
    }
}
