<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Hilight;

class HomeController extends Controller
{
    public function index()
    {
        $hilights = Hilight::where('status', 1)->orderBy('id', 'desc')->get();
        return view('home', compact('hilights'));
    }
}
