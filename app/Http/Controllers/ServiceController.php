<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ServiceCategory;
use App\Service;
use App;

class ServiceController extends Controller
{
    public function category($id)
    {
        $service_category = ServiceCategory::findOrFail($id)->translate(App::getLocale());
        $services = Service::with('translations')->where('service_category_id', $id)->where('status', 1)->orderBy('id','desc')->paginate(3);
        return view('service-category', compact('service_category', 'services'));
    }

    public function detail($id)
    {
        $service = Service::with('translations')->findOrFail($id)->translate(App::getLocale());
        return view('service-detail', compact('service'));
    }
}
