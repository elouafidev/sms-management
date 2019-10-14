<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ScheduledSms;

class ScheduledSmsController extends Controller
{
    public function index(){
        $smses = ScheduledSms::paginate(10);

        return view('sms.scheduled', ['smses' => $smses]);
    }
}
