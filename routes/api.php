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

// ! ==== Complain

Route::get("/v1/complain", function () {
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
});

Route::post("/v1/complain/create", function (Request $request) {
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
});

Route::get("/v1/complain/{id}", function (Request $request, $id) {
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
});


Route::put("/v1/complain-update/{id}", function (Request $request, $id) {
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
});

Route::delete("/v1/complain-delete/{id}", function (Request $request, $id) {
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
});

// ! ==== Complain



// ? ==== Table Order

Route::get("/v1/table-order", function () {
    $dbTable = DB::table("table_order")->get();
    if ($dbTable == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something Went Wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Successfully Get Table",
            "data" => $dbTable
        ], 200);
    }
});

Route::post("/v1/table-order/create", function (Request $request) {
    $dbTable = DB::table("table_order")->insert([
        "name" => $request->input("name"),
    ]);

    if ($dbTable == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something Went Wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 201,
            "error" => false,
            "message" => "Successfully Create Table",
        ], 201);
    }
});

Route::get("/v1/table-order/{id}", function (Request $request, $id) {
    $dbTable = DB::table("table_order")->where("id", $id)->get();
    if ($dbTable == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something Went Wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Successfully Get Detail Table",
            "data" => $dbTable
        ], 200);
    }
});


Route::put("/v1/table-update/{id}", function (Request $request, $id) {
    $dbTable = DB::table("table_order")->where("id", $id)->update([
        "name" => $request->input("name"),
    ]);
    if ($dbTable == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something Went Wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Successfully Update Table Order",
        ], 200);
    }
});

Route::delete("/v1/table-delete/{id}", function (Request $request, $id) {
    $dbTable = DB::table("table_order")->delete($id);
    if ($dbTable == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something Went Wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Successfully Delete Table Order",
        ], 200);
    }
});

// ? ==== Table Order



// ! ==== Staff Call

Route::get("/v1/staff-call", function () {
    $dbStaff = DB::table("staff_call")->get();
    if ($dbStaff == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something Went Wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Successfully Get Message",
            "data" => $dbStaff
        ], 200);
    }
});

Route::post("/v1/staff-call/create", function (Request $request) {
    $dbStaff = DB::table("staff_call")->insert([
        "table_id" => $request->input("table_id"),
        "message" => $request->input("message"),
    ]);

    if ($dbStaff == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something Went Wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 201,
            "error" => false,
            "message" => "Successfully Create Message to Staff",
        ], 201);
    }
});

Route::get("/v1/staff-call/{id}", function (Request $request, $id) {
    $dbStaff = DB::table("staff_call")->where("id", $id)->get();
    if ($dbStaff == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something Went Wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Successfully Get Detail Message",
            "data" => $dbStaff
        ], 200);
    }
});

Route::put("/v1/staff-call/{id}", function (Request $request, $id) {
    $dbTable = DB::table("staff_call")->where("id", $id)->update([
        "table_id" => $request->input("table_id"),
        "message" => $request->input("message"),
    ]);
    if ($dbTable == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something Went Wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Successfully Update Message to Staff",
        ], 200);
    }
});

Route::delete("/v1/staff-delete/{id}", function (Request $request, $id) {
    $dbTable = DB::table("staff_call")->delete($id);
    if ($dbTable == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something Went Wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Successfully Delete Message to Staff",
        ], 200);
    }
});

// ! ==== Staff Call



// ? ==== Restaurant Detail

Route::get("/v1/restaurant", function () {
    $dbResto = DB::table("restaurant_detail")->get();
    if ($dbResto == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something Went Wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Successfully Get Restaurant Detail",
            "data" => $dbResto
        ], 200);
    }
});

Route::post("/v1/restaurant/create", function (Request $request) {
    $dbResto = DB::table("restaurant_detail")->insert([
        "setting_name" => $request->input("setting_name"),
        "open_hour" => $request->input("open_hour"),
        "closed_hour" => $request->input("closed_hour"),
        "location" => $request->input("location"),
        "description" => $request->input("description"),
        "logo" => $request->input("logo"),
    ]);

    if ($dbResto == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something Went Wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 201,
            "error" => false,
            "message" => "Successfully Create Restaurant Detail",
        ], 201);
    }
});

Route::get("/v1/restaurant/{setting_name}", function (Request $request, $setting_name) {
    $dbResto = DB::table("restaurant_detail")->where("setting_name", $setting_name)->get();
    if ($dbResto == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something Went Wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Successfully Get Restaurant Detail",
            "data" => $dbResto
        ], 200);
    }
});


Route::put("/v1/restaurant-update/{setting_name}", function (Request $request, $setting_name) {
    $dbTable = DB::table("restaurant_detail")->where("setting_name", $setting_name)->update([
        "setting_name" => $request->input("setting_name"),
        "open_hour" => $request->input("open_hour"),
        "closed_hour" => $request->input("closed_hour"),
        "location" => $request->input("location"),
        "description" => $request->input("description"),
        "logo" => $request->input("logo"),
    ]);
    if ($dbTable == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something Went Wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Successfully Update Restaurant Detail",
        ], 200);
    }
});

Route::delete("/v1/restaurant-delete/{setting_name}", function (Request $request, $setting_name) {
    $dbResto = DB::table("restaurant_detail")->delete($setting_name);
    if ($dbResto == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something Went Wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Successfully Delete Table Order",
        ], 200);
    }
});

// ? ==== Restaurant Detail