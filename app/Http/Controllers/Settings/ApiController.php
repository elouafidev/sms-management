<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Inbox;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class ApiController extends Controller
{
    public function index(){
        $User = Auth::user();
        return view('settings.api.index', ['User' => $User]);
    }

    public function store(Request $request){

        Alert::success(__('Reset Successfully'), __('Token Api has ben Reset'));
        Auth::user()->ResetToken()->save();
        $default = route('settings.api.index');
        return redirect($request->header('referer', $default));
    }
}
