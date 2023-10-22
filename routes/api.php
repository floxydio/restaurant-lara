<?php

use App\Http\Controllers\ComplainController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


/*
  /v1/endpoint_name

*/

// ==== Complain
Route::get("/v1/complain",[ComplainController::class, "getComplain"]);

Route::post("/v1/complain/create", function(Request $request) {

    $dbComplain = DB::table("complain")->insert([
        "name" => $request->input("name"),
        "message" => $request->input("message")
    ]);

    if($dbComplain == null) { 
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
});

Route::get("/v1/complain/{id}", function(Request $request, $id) {
    $dbComplain = DB::table("complain")->where("id",$id)->get();
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
});


Route::put("/v1/complain-update/{id}", function(Request $request, $id) {
    $dbComplain = DB::table("complain")->where("id",$id)->update([
        "name" => $request->input("name"),
        "message" => $request->input("message")
    ]);
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
            "message" => "Successfully Update Complain",
        ], 200);
    }
});

Route::delete("/v1/complain-delete/{id}", function(Request $request, $id) {
    $dbComplain = DB::table("complain")->delete($id);
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
            "message" => "Successfully Delete Complain",
        ], 200);
    }
});
// ==== Complain