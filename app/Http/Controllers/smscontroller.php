<?php

namespace App\Http\Controllers;

use App\Exports\SMSExport;
use Illuminate\Http\Request;
use AfricasTalking\SDK\AfricasTalking;
use Maatwebsite\Excel\Facades\Excel;


class smscontroller extends Controller
{
    public function sendsms(Request $request){

        $username = 'smsappjubilee'; // use 'sandbox' for development in the test environment
        $apiKey = '2981aa2f28fc4012467729b6955889b2c45091b683c7a00c059c990f30afcaa6'; // use your sandbox app API key for development in the test environment
        $AT = new AfricasTalking($username, $apiKey);
        // Get one of the services
        $sms = $AT->sms();
        // Use the service
        $result= $sms->send([
            'to' => $request->phone,
            'message' => $request->message,
        ]);
        $data=$result["data"];
        $data=([$request->message, $data->SMSMessageData->Recipients[0]->status]);
      return Excel::download(new SMSExport([$data]), 'export.xls');
    }
}
