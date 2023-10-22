<?php

namespace App\Http\Controllers;

use  Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ComplainController extends Controller
{

    public function getComplain()
    {
        $dbComplain = DB::table("complain")->get();
        if ($dbComplain == null) {
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

    public function createComplain(Request $request)
    {
        $dbComplain = DB::table("complain")->insert([
            "name" => $request->input("name"),
            "message" => $request->input("message")
        ]);

        if ($dbComplain == null) {
            return response()->json([
                "status" => 400,
                "error" => true,
                "message" => "Something Went Wrong"
            ], 400);
        } else {
            return response()->json([
                "status" => 201,
                "error" => false,
                "message" => "Successfully Create Complain",
            ], 201);
        }
    }

    public function detailComplain(Request $request, $id)
    {
        $dbComplain = DB::table("complain")->where("id", $id)->get();
        if ($dbComplain == null) {
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

    public function updateComplain(Request $request, $id)
    {
        $dbComplain = DB::table("complain")->where("id", $id)->update([
            "name" => $request->input("name"),
            "message" => $request->input("message")
        ]);
        if ($dbComplain == null) {
            return response()->json([
                "status" => 400,
                "error" => true,
                "message" => "Something Went Wrong"
            ], 400);
        } else {
            return response()->json([
                "status" => 200,
                "error" => false,
                "message" => "Successfully Update Complain",
            ], 200);
        }
    }

    public function deleteComplain(Request $request, $id)
    {
        $dbComplain = DB::table("complain")->delete($id);
        if ($dbComplain == null) {
            return response()->json([
                "status" => 400,
                "error" => true,
                "message" => "Something Went Wrong"
            ], 400);
        } else {
            return response()->json([
                "status" => 200,
                "error" => false,
                "message" => "Successfully Delete Complain",
            ], 200);
        }
    }
}
