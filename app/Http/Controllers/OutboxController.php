<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Outbox;
use RealRashid\SweetAlert\Facades\Alert;

class OutboxController extends Controller
{
    public function index(){
        $outboxes = Outbox::orderBy('SendingDateTime', 'desc')->paginate(10);
        return view('sms.outbox', ['outboxes' => $outboxes]);
    }

    public function delete($id){
        $outbox = Outbox::findOrFail($id);
        if ($outbox == null) {
            Alert::danger('Outgoing SMS', 'Not found');
            return \redirect()->route('sms.outbox');
        }

        $outbox->delete();
        Alert::success('Successfully Removed', 'Outgoing SMS Deleted Successfully');
        return \redirect()->route('sms.outbox');
    }
}
