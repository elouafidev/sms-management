<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inbox;

class InboxController extends Controller
{
    public function index(){
        $inboxes = Inbox::orderBy('ReceivingDateTime', 'desc')->paginate(10);
        return view('sms.inbox', ['inboxes' => $inboxes]);
    }
}
