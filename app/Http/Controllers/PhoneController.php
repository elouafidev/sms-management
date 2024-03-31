<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Phone;

class PhoneController extends Controller
{
    public function index(){
        $phone = Phone::all();
        return view('phone.index', ['phone' => $phone]);
    }
}
