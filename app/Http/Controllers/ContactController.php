<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Contact;

class ContactController extends Controller
{
    public function index(){

        return view('contacts.index', ['contacts' => Contact::all()]);
    }
}
