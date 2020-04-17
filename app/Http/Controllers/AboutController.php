<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\About;
use App\Doctor;

class AboutController extends Controller
{
    public function index()
    {
        $about = About::findOrFail(1);
        $why = About::findOrFail(2);
        $doctor = Doctor::where('status', 1)->orderBy('id', 'desc')->get();
        
        return view('home', compact('about', 'why', 'doctor'));
    }
}
