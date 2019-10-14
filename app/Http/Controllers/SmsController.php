<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Outbox;
use App\ScheduledSms;
Use Alert;

class SmsController extends Controller
{
    public function index(){
        return view('sms.direct');
    }

    public function store(Request $request){
        $phone_number = $request->phone_number;
        $sms_content = $request->sms_content;
        
        $CreatorID = Auth::id();

        // sending sms directly
        $new_direct_outbox = Outbox::create(['DestinationNumber' => $phone_number, 'TextDecoded' => $sms_content, 'CreatorID' => $CreatorID]);

        Alert::success('Sukses di Input', 'SMS akan segera dikirim');
        return redirect()->route('sms.inbox')->with('status', 'Success Sending');
    }

    public function schedule(){
        return view('sms.schedule');
    }

    public function scheduleStore(Request $request){
        $phone_number = $request->phone_number;
        $sms_content = $request->sms_content;
        $repeat = $request->repeat;
        $CreatorID = Auth::id();

        // pick day and hour scheduling sms
        $day = explode(' ', $request->date)[0];
        $time = explode(' ', $request->date)[1];
        
        ScheduledSms::create([
            'phone_number' => $phone_number, 
            'sms_content' => $sms_content, 
            'day' => $day,
            'time' => $time,
            'repeat' => $repeat,
            'CreatorID' => $CreatorID,
        ]);

        Alert::success('Success Title', 'Success Message');
        return redirect()->route('sms.schedule');
    }
}
