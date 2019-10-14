<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use App\Outbox;

class OutboxController extends Controller
{
    public function index(){
        $outboxes = Outbox::orderBy('SendingDateTime', 'desc')->paginate(10);
        return view('sms.outbox', ['outboxes' => $outboxes]);
    }

    public function delete($id){
        $outbox = Outbox::findOrFail($id);    
        if ($outbox == null) {
            Alert::danger('SMS Keluar', 'Tidak Ditemukan');
            return \redirect()->route('sms.outbox');
        }
        
        $outbox->delete();
        Alert::success('Sukses Dihapus', 'SMS Keluar Berhasil Dihapus');
        return \redirect()->route('sms.outbox');
    }
}
