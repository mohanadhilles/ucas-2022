<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\User;
use Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;





class ServiceController extends Controller
{
    public function addService(Request $req){

        $valid = Validator::make($req->all(),[
            "service" => "required",
            "jomla_price" => "required",
        ]);

        if ($valid->fails()){
            return response()->json([
                "status" => "error",
                "error" => $valid->errors()
            ]);
        }


        $service = new Service();
        $service->service = $req->service;
        $service->jomla_price = $req->jomla_price;
        $service->user_id = $req->user_id;

        

        $result = $service->save();
        if ($result) {
            return ["msg" => "Data Added Successfully"];
        }else{
            ["msg" => "Data not Added"];
        }
    }

    public function getService($id = null ){
        // $data = $id ? Service::find($id) : Service::all();
        // $data = $id ? Service::find($id) : DB::table('services')->orderBy('id', 'DESC') ->get();

        $user =  $id ? Service::find($id) : Service::where('user_id','=',Auth::id())->orderBy('id', 'DESC')->get();

        // $user = Auth::user();
        return response()->json([
            'status' => 'success',
            // 'data' => $data,
            'data' => $user
        ]);
    }

    public function delete($id){
        $del = Service::find($id);
        $result = $del->delete();

        if ($result) {
            return ["msg" => "Data deleted successfully"];
        }else{
            return ["msg" => "Data note deleted"];
        }
    }

    public function update(Request $req , $id){
        $valid = Validator::make($req->all(),[
            "service" => "required",
            "jomla_price" => "required",
        ]);

        if ($valid->fails()){
            return response()->json([
                "status" => "error",
                "error" => $valid->errors()
            ]);
        }

        $service = Service::find($id);
        $service->service = $req->service;
        $service->jomla_price = $req->jomla_price;
        $service->user_id = $req->user_id;

        
        $result = $service->save();
        if ($result) {
            return ["msg" => "Data Updated Successfully"];
        }else{
            ["msg" => "Data not Updated"];
        }
    }

    public function searchData($data = null){
        $data = DB::table('services')
        ->where('user_id', Auth::id())
        ->where('service', 'like', "%".$data."%")
        // ->orWhere('jomla_price', 'like', "%".$data."%")
        ->orderBy('services.id', 'DESC')->get();
        return $data;
    }


}
