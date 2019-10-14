<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Inbox;

class InboxController extends Controller
{
    public function index(){
        $inboxes = Inbox::orderBy('ReceivingDateTime', 'desc')->paginate(10);
        return view('sms.inbox', ['inboxes' => $inboxes]);
    }

    public function delete(Request $request, $id){
        Inbox::findOrFail($id)->delete();

        Alert::success('Sukses Dihapus', 'SMS Masuk Telah Dihapus');

        $default = route('sms.inbox');
        return redirect($request->header('referer', $default));
    }
}
