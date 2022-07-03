<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Msrofat;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class MsrofatController extends Controller
{
    public function addMsrofat(Request $req ){

        $valid = Validator::make($req->all(),[
            // "service_s" => "required",
            "quantity" => "required|integer",
            "price" => "required|integer",
        ]);

        if ($valid->fails()){
            return response()->json([
                "status" => "error",
                "error" => $valid->errors()
            ]);
        }

        $msrofat = new Msrofat();
        $msrofat->user_id = $req->user_id;
        $msrofat->service_s = $req->service_s;
        $msrofat->quantity = $req->quantity;
        $msrofat->price = $req->price;
        $msrofat->note = $req->note;
        $msrofat->date_md = $req->date_md;


        

        $result = $msrofat->save();
        if ($result) {
            return ["msg" => "Data Added Successfully"];
        }else{
            ["msg" => "Data not Added"];
        }
    }

    public function getMsrofat($id = null){
        // $data = $id ? Msrofat::find($id) : Msrofat::all();

        $data = $id ? Msrofat::find($id) : DB::table('services')
        ->join('msrofats' , 'msrofats.service_s','=','services.id' )
        ->where('msrofats.user_id', Auth::id())
        ->orderBy('msrofats.id', 'DESC')->get();


        // $user =  Msrofat::where('user_id','=',Auth::id())
        // ->orderBy('id', 'DESC')->get();
        return response()->json([
            'status' => 'success',
            'data' => $data,
        ]);
    }

    public function delete($id){
        $del = Msrofat::find($id);
        $result = $del->delete();

        if ($result) {
            return ["msg" => "Data deleted successfully"];
        }else{
            return ["msg" => "Data note deleted"];
        }
    }

    public function updateM(Request $req , $id){
        $valid = Validator::make($req->all(),[
            "quantity" => "required|integer",
            "price" => "required|integer",
        ]);

        if ($valid->fails()){
            return response()->json([
                "status" => "error",
                "error" => $valid->errors()
            ]);
        }

        $msrofat = Msrofat::find($id);
        $msrofat->user_id = $req->user_id;
        $msrofat->service_s = $req->service_s;
        $msrofat->quantity = $req->quantity;
        $msrofat->price = $req->price;
        $msrofat->note = $req->note;

        
        $result = $msrofat->save();
        if ($result) {
            return ["msg" => "Data Updated Successfully"];
        }else{
            ["msg" => "Data not Updated"];
        }
    }

    public function search($data = null){
        $data = DB::table('services')
        ->join('msrofats' , 'msrofats.service_s','=', 'services.id' )
        ->where('msrofats.user_id', Auth::id())
        ->where('service', 'like', "%".$data."%")
        // ->orWhere('price', 'like', "%".$data."%")
        ->orderBy('msrofats.id', 'DESC')->get();

        return $data;
    }

    function Searchms($data = null){
        // $data = Income::where('created_at', 'like', "%".$data."%")->get();
        
        $data = DB::table('services')
        ->join('msrofats' , 'msrofats.service_s','=', 'services.id' )
        ->where('msrofats.user_id', Auth::id())
        ->where('date_md', 'like', "%".$data."%")->orderBy('msrofats.id', 'DESC')->get();
        return $data;
    }
}
