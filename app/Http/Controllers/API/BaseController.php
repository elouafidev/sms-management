<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;

class BaseController extends Controller

{

    /**
 * success response method.
 *

     * @return \Illuminate\Http\JsonResponse
     */

    public function sendResponse($result, $message = '')

    {

        $response = [
            'success' => true,
            'data'    => $result,
            'date' => Carbon::now()->format('d-m-Y.H:i:s')
        ];

        if(!empty($message)){
            $response['message'] = $message;
        }


        return response()->json($response, 202);

    }


    /**
 * return error response.
 *

     * @return \Illuminate\Http\JsonResponse
     */

    public function sendError($type,$info, $code = 404, $data=[])

    {

        $response = [
            'success' => false,
            'error' => [
                'code' => $code,
                'type' => $type,
                'info' => $info
            ],
            'date' => Carbon::now()->format('d-m-Y.H:i:s')
        ];


        if(!empty($data)){
            $response['data'] = $data;
        }


        return response()->json($response, $code);

    }

}
