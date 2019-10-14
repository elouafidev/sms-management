<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use Alert;
use App\ScheduledSms;

class ScheduledSmsController extends Controller
{
    public function index(){
        $smses = ScheduledSms::orderBy('created_at', 'desc')->paginate(10);
        return view('sms.scheduled', ['smses' => $smses]);
    }

    public function delete(Request $request){

        // return dd($request->header('referer'));
        $sms = ScheduledSms::findOrFail($request->id);
        $sms->delete();

        Alert::success('Sukses di Hapus', 'SMS Telah dihapus');
        return redirect($request->header('referer'));
    }

    public function edit(Request $request, $id){
        
        $previously_page = $request->header('referer');
        $sms = ScheduledSms::findOrFail($id);

        return view('sms.scheduled-edit', ['sms' => $sms, 'prev_page' => $previously_page]);
    }

    public function update(Request $request){

        $sms = ScheduledSms::findOrFail($request->id);
        $sms->phone_number = $request->phone_number;
        $sms->sms_content = $request->sms_content;
        $sms->repeat = $request->repeat;
        $sms->CreatorID = Auth::id();

        $sms->day = explode(' ', $request->date)[0];
        $sms->time = explode(' ', $request->date)[1];
        
        $sms->save();

        $previously_page = $request->prev_page;
        
        $previously_page = ($previously_page !== null ) ? $request->prev_page : $request->header('referer');

        Alert::success('Sukses Diubah', 'SMS Terjadwal Telah DiUbah');
        return \redirect($previously_page);
    }
}
