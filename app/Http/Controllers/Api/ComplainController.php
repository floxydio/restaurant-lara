<?php

namespace App\Http\Controllers;

use  Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;




class ComplainController extends Controller {

    public function getComplain(Request $request) {
        $dbComplain = DB::table("complain")->get();
        if($dbComplain == null) {
            return response()->json([
                "status" => 400,
                "error" => true,
                "message" => "Something Went Wrong"
            ], 400);
        } else {
            return response()->json([
                "status" => 200,
                "error" => false,
                "message" => "Successfully Get Complain",
                "data" => $dbComplain
            ], 200);
        }
    }

}
