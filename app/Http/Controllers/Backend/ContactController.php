<?php

namespace App\Http\Controllers\Backend;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ContactController extends Controller
{
    public function index()
    {
        $title = "Danh sách liên hệ";
        $contacts = Contact::latest()->get();
        return view('backend.contact.contact', compact('title', 'contacts'));
    }
}
