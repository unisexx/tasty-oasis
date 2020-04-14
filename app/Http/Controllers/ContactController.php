<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ContactRequest;
use App\Contact;
use App\Message;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::firstOrFail();
        return view('contact', compact('contact'));
    }

    public function save(ContactRequest $request)
    {
        $requestData = $request->all();
        Message::create($requestData);

        set_notify('success', 'ส่งข้อความเรียบร้อย');
        return back();
    }
}
