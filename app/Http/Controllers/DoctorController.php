<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;
use App;

class DoctorController extends Controller
{
    public function profile($id)
    {
        $doctor = Doctor::findOrFail($id)->translate(App::getLocale());
        
        return view('doctor-profile', compact('doctor'));
    }
}
