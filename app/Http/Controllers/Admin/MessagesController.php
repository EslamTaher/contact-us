<?php

namespace App\Http\Controllers\Admin;
use App\Message;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->paginate(2);
        return view('admin.messages.index', compact('messages'));
    }
}
