<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Order;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back();
    }

    public function index()
    {
        $orders = Order::all();
        $contact = Contact::all();
        return view('contact.index',compact('contact','orders'));
    }
}
