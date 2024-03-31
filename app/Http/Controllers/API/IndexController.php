<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Api\BaseController as Controller;
use http\Exception\BadConversionException;
use Illuminate\Encryption\Encrypter;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class IndexController extends Controller
{
    public function index(Request $request){
        $ApiRequest = $request->input('request');
/*        try{
            $key = Str::random(32);

            //Keys and cipher used by encrypter(s)
            $toKey = base64_decode($key);
            $cipher = "AES-256-CBC"; //or AES-128-CBC if you prefer

            //Create two encrypters using different keys for each
            $encrypterTo = new Encrypter($toKey, $cipher);

            $decryptedFromString = $encrypterTo->decryptString("gobbledygook=that=is=a=from=key=encrypted=string==");

            //Now encrypt the decrypted string using the "to" key
            $encryptedToString = $encrypterTo->encryptString($decryptedFromString);

        }catch (BadConversionException $exception){
            return $this->sendError('bad_request',$exception->getMessage(),404);

        }*/
        switch ($ApiRequest){
            case 'send' : {
                return (new SmsController())->Send($request->all());
            }
        }
        return $this->sendError('bad_request','your request this not correct , contact support pls',404);
    }
}
