<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use Validator;
use Illuminate\Support\Facades\Auth;


class ContactController extends Controller
{
    public function addContact(Request $req){

        $valid = Validator::make($req->all(),[
            "name" => "required|min:3",
            "email" => "required|email",
            "phone" => "required|numeric|digits:10",
        ]);

        if ($valid->fails()){
            return response()->json([
                "status" => "error",
                "error" => $valid->errors()
            ]);
        }


        $contact = new Contact();
        $contact->user_id = $req->user_id;
        $contact->name = $req->name;
        $contact->email = $req->email;
        $contact->phone = $req->phone;
        $contact->address = $req->address;
        $contact->notes = $req->notes;
        
        if ($req->img){
            $name = time().'.'.$req->img->extension();
            $req->img->move(public_path('contactImg'),$name);
            $contact->img = $name;
        }
        else{
            $contact->img = 'default.png';
        }

        

        $result = $contact->save();
        if ($result) {
            return ["msg" => "Data Added Successfully"];
        }else{
            ["msg" => "Data not Added"];
        }
    }

    public function getContact($id = null){
        $data =  Contact::where('user_id','=',Auth::id())->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }
}
