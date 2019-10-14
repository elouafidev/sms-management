<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Outbox;

class OutboxController extends Controller
{
    public function index(){
        $outboxes = Outbox::orderBy('SendingDateTime', 'desc')->paginate(10);
        return view('sms.outbox', ['outboxes' => $outboxes]);
    }
}
