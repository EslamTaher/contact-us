<?php

namespace App\Http\Controllers\User;
use App\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactFormMail;

class ContactController extends Controller
{
    public function index()
    {
        return view('user.contact');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|max:255',
            'message' => 'required|string|max:1000',
        ]);
        
        Message::create([
            'name'  => $request->name,
            'email'  => $request->email,
            'phone'  => $request->phone,
            'message'  => $request->message,

        ]);

        Mail::to('eslamtaher333@yahoo.com')->send(new ContactFormMail($request));

        return redirect()->back()->with('message','your message has been sent');
    }
}
