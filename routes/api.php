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


// ! === Audit

Route::get("/v1/audit", function() {
    $dbAudit = DB::table("audit")->get();
    if ($dbAudit == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something went wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Successfully get audit",
            "data" => $dbAudit
        ], 200);
    }
});

Route::get("/v1/audit/{id}", function (Request $request, $id) {
    $dbAudit = DB::table("audit")->where("id", $id)->get();

    if($dbAudit == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something went wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Successfully get audit by id",
            "data" => $dbAudit
        ], 200);
    }
});

Route::post("/v1/audit/create", function (Request $request) {
    $dbAudit = DB::table("audit")->insert([
        "activity_name" => $request->input("activity_name"),
        "table_name" => $request->input("table_name"),
        "user_id" => $request->input("user_id")
    ]);

    if($dbAudit == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something went wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 201,
            "error" => false,
            "message" => "Successfully create audit",
        ], 201);
    }
});

Route::put("/v1/audit-update/{id}", function (Request $request, $id) {
    $dbAudit = DB::table("audit")->where("id", $id)->update([
        "activity_name" => $request->input("activity_name"),
        "table_name"=> $request->input("talbe_name"),
        "user_id"=> $request->input("user_id")
    ]);

    if($dbAudit == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something went wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Sucessfully get audit"
        ], 200);
    }
});

Route::delete("/v1/audit-delete/{id}", function (Request $request, $id) {
    $dbAudit = DB::table("audit")->delete($id);

    if($dbAudit == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something went wrong"
        ], 400);
    } else {
        return response([
            "status" => 200,
            "error" => false,
            "message" => "Successfully delete audit"
        ], 200);
    }
});

// ! Audit ===


// ! === Order Transaction

Route::get("/v1/order-transaction", function() {
    $dbOrderTransaction = DB::table("order_transaction")->get();
    if($dbOrderTransaction == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something went wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Successfully get order transaction",
            "data" => $dbOrderTransaction
        ], 200);
    }
});

Route::get("/v1/order-transaction/{id}", function (Request $request, $id) {
    $dbOrderTransaction = DB::table("order_transaction")->where("id", $id)->get();
    if($dbOrderTransaction == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something went wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Successfully get order transaction by id",
            "data" => $dbOrderTransaction
        ], 200);
    }
});

Route::post("/v1/order-transaction/create", function (Request $request) {
    $dbOrderTransaction = DB::table("order_transaction")->insert([
        "order_list" => $request->input("order_list"),
        "total_price" => $request->input("total_price"),
        "status_order" => $request->input("status_order"),
        "type" => $request->input("type"),
        "table_id" => $request->input("table_id")
    ]);

    if($dbOrderTransaction == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something went wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 201,
            "error" => false,
            "message" => "Successfully create order transaction"
        ], 201);
    }

});

Route::put("/v1/order-transaction-update/{id}", function (Request $request, $id) {
    $dbOrderTransaction = DB::table("order_transaction")->where("id", $id)->update([
        "order_list" => $request->input("order_list"),
        "total_price" => $request->input("total_price"),
        "status_order" => $request->input("status_order"),
        "type" => $request->input("type"),
        "table_id" => $request->input("table_id")
    ]);

    if($dbOrderTransaction == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something went wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Successfully update order transaction"
        ], 200);
    }
});

Route::delete("/v1/order-transaction-delete/{id}", function(Request $request, $id) {
    $dbOrderTransaction = DB::table("order_transaction")->delete($id);
    if($dbOrderTransaction == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something went wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Successfully delete order transaction"
        ], 200);
    }
});

// ! Order Transaction ===


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


// ! === Transaction History

Route::get("/v1/transaction-history", function() {
    $dbTransactionHistory = DB::table("transaction_history")->get();
    if ($dbTransactionHistory == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something went wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Successfully get transaction history",
            "data" => $dbTransactionHistory
        ], 200);
    }
});

Route::get("/v1/transaction-history/{id}", function(Request $request, $id) {
    $dbTransactionHistory = DB::table("transaction_history")->where("id", $id)->get();
    if ($dbTransactionHistory == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something went wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Successfully get transaction history by id",
            "data" => $dbTransactionHistory
        ], 200);
    }
});

Route::post("/v1/transaction-history/create", function (Request $request) {
    $dbTransactionHistory = DB::table("transaction_history")->insert([
        "trx_id" => $request->input("trx_id"),
        "order_id" => $request->input("order_id"),
        "total_price" => $request->input("total_price")
    ]);

    if ($dbTransactionHistory == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something went wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 201,
            "error" => false,
            "message" => "Successfully create transaction history",
        ], 201);
    }
});

Route::put("/v1/transaction-history-update/{id}", function (Request $request, $id) {
    $dbTransactionHistory = DB::table("transaction_history")->where("id", $id)->update([
        "trx_id" => $request->input("trx_id"),
        "order_id" => $request->input("order_id"),
        "total_price" => $request->input("total_price")
    ]);

    if ($dbTransactionHistory == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something went wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Successfully create transaction history",
        ], 200);
    }
});

Route::delete("/v1/transaction-history-delete/{id}", function (Request $request, $id) {
    $dbTransactionHistory = DB::table("transaction_history")->delete($id);

    if ($dbTransactionHistory == null) {
        return response()->json([
            "status" => 400,
            "error" => true,
            "message" => "Something went wrong"
        ], 400);
    } else {
        return response()->json([
            "status" => 200,
            "error" => false,
            "message" => "Successfully delete transaction history",
        ], 200);
    }
});

// ! Trasacntion History ===




