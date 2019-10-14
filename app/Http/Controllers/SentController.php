<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\SentItem;

class SentController extends Controller
{
    public function index(){
        $sentItems = SentItem::orderBy('SendingDateTime', 'desc')->paginate(10);
        return view('sms.sent', ['sentItems' => $sentItems]);
    }

    public function delete(Request $request, $id){
        SentItem::findOrFail($id)->delete();
        Alert::success('Sukses Dihapus', 'SMS Masuk Telah Dihapus');

        return redirect($request->header('referer', $default = route('sms.sent'))); 
    }
}
