<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Income;
use Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class IncomeController extends Controller
{
    public function addIncome(Request $req ){

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

        $msrofat = new Income();
        $msrofat->user_id = $req->user_id;
        $msrofat->service_s = $req->service_s;
        $msrofat->quantity = $req->quantity;
        $msrofat->price = $req->price;
        $msrofat->note = $req->note;
        $msrofat->date_ed = $req->date_ed;

        

        $result = $msrofat->save();
        if ($result) {
            return ["msg" => "Data Added Successfully"];
        }else{
            ["msg" => "Data not Added"];
        }
    }

    public function getIncome($id = null){
        // $data = $id ? Income::find($id) : Income::all();

        $data = $id ? Income::find($id) : DB::table('services')
        ->join('incomes' , 'incomes.service_s','=','services.id' )
        ->where('incomes.user_id', Auth::id())
        ->orderBy('incomes.id', 'DESC')->get();


        return response()->json([
            'status' => 'success',
            'data' => $data
        ]);
    }

    public function deleteI($id){
        $del = Income::find($id);
        $result = $del->delete();

        if ($result) {
            return ["msg" => "Data deleted successfully"];
        }else{
            return ["msg" => "Data note deleted"];
        }
    }

    public function updateI(Request $req , $id){
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

        $msrofat = Income::find($id);
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


    function Search($data = null){
        // $data = Income::where('created_at', 'like', "%".$data."%")->get();
        
        $data = DB::table('services')
        ->join('incomes' , 'incomes.service_s','=', 'services.id' )
        ->where('incomes.user_id', Auth::id())
        ->where('date_ed', 'like', "%".$data."%")
        ->orderBy('incomes.id', 'DESC')->get();
        return $data;
    }

    public function searchData($data = null){
        $data = DB::table('services')
        ->join('incomes' , 'incomes.service_s','=', 'services.id' )
        ->where('incomes.user_id', Auth::id())
        ->where('service', 'like', "%".$data."%")
        // ->orWhere('price', 'like', "%".$data."%")
        ->orderBy('incomes.id', 'DESC')->get();

        return $data;
    }

    
}
