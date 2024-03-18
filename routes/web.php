<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AccountController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => ['guest']], function() {
    Route::get("/", [HomeController::class, 'index'])->name("home");

    Route::post("/login-attempt", [AuthController::class, 'loginAccount'])->name("login.attempt");

    Route::get("/register", [HomeController::class, 'register'])->name("register");

    Route::post("/register/create-account", [AuthController::class, 'createAccount'])->name("register.submit");
});

Route::group(['middleware' => ['user']], function(){

    Route::get("/account",[AccountController::class,'account'])->name("account");

    Route::post("/account/update",[AccountController::class,'updateAccount'])->name("account.update");

    Route::get("/account/dashboard",[AccountController::class,'dashboard'])->name("account.dashboard");

    Route::get("/account/transfer-funds",[AccountController::class,'transferFunds'])->name("account.transfer");

    Route::post("/account/transfer-funds/submit",[AccountController::class,'submitTransfer'])->name("account.transfer.submit");

    Route::post("/account/deposit/submit",[AccountController::class,'validateDeposit'])->name("account.deposit.submit");

    Route::get("/account/withdraw",[AccountController::class,'withdraw'])->name("account.withdraw");

    Route::get("/account/deposit", [AccountController::class,'deposit'])->name("account.deposit");

    Route::post("/account/withdraw/purchase",[AccountController::class,'purchasewithdraw'])->name("account.withdraw.purchase");

    Route::get("/account/logout",[AuthController::class,'logout'])->name("account.logout");

});
