<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SentItem;

class SentController extends Controller
{
    public function index(){
        $sentItems = SentItem::orderBy('SendingDateTime', 'desc')->paginate(10);
        return view('sms.sent', ['sentItems' => $sentItems]);
    }
}
