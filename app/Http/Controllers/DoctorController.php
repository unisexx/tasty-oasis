<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Doctor;

class DoctorController extends Controller
{
    public function profile($id)
    {
        $doctor = Doctor::findOrFail($id);
        
        return view('doctor-profile', compact('doctor'));
    }
}
