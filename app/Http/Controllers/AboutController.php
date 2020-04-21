<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use App\Doctor;
use App;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::findOrFail(1)->translate(App::getLocale());
        $doctors = Doctor::where('status', 1)->orderBy('id', 'desc')->get();
        
        return view('about', compact('about', 'doctors'));
    }
}
