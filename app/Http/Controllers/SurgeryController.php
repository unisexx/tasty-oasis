<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Surgery;

class SurgeryController extends Controller
{
    public function index(){
        $surgeries = Surgery::where('status', 1)->orderBy('order','asc')->paginate(3);
        return view('surgery', compact('surgeries'));
    }

    public function detail($id){
        $surgery = Surgery::findOrFail($id);
        return view('surgery-detail', compact('surgery'));
    }
}
