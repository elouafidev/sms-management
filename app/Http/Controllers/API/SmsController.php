<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as Controller;
use App\Models\Outbox;
use Illuminate\Encryption\Encrypter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class SmsController extends Controller
{
    public function Send($data){
        $validator = Validator::make($data, [
            'phone' => ['required', 'string','max:14','regex:/(00212)[5-8]{1}[0-9]{8}/'],
            'content' => ['required','max:256'],
        ]);
        if($validator->fails()){
            return $this->sendError('Validation_Error.', $validator->errors());
        }

        $phone_number = $data['phone'];
        $sms_content = $data['content'];

        $CreatorID = Auth::id();

        // sending sms directly
        $newDirectOutbox = Outbox::create([
            'DestinationNumber' => $phone_number,
            'TextDecoded' => $sms_content,
            'CreatorID' => $CreatorID
        ]);

        return $this->sendResponse($newDirectOutbox->toArray(),'SMS will be sent soon');
    }
}
