<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\mail;
use Validator;
use Illuminate\Support\Facades\Auth;


class MailsController extends Controller
{
    public function sendMessage(Request $req ){

        $valid = Validator::make($req->all(),[
            "name_cus" => "required",
            "message" => "required",
        ]);

        if ($valid->fails()){
            return response()->json([
                "status" => "error",
                "error" => $valid->errors()
            ]);
        }

        $mails = new mail();
        $mails->user_id = $req->user_id;
        $mails->name_cus = $req->name_cus;
        $mails->address_msg = $req->address_msg;
        $mails->message = $req->message;
        $mails->date_ms = $req->date_ms;
        
        $result = $mails->save();
        if ($result) {
            return ["msg" => "Message Sent Successfully"];
        }else{
            ["msg" => "Message not Sented"];
        }
    }


    public function getMessage($id = null){
        $data = $id ? mail::find($id) : mail::where('user_id','=',Auth::id())->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function searchData($data = null){
        $data = mail::where('name_cus', 'like', "%".$data."%")
        ->where('mails.user_id', Auth::id())
        ->get();

        return $data;
    }

}
