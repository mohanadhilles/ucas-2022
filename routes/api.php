<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\MsrofatController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MonthlyexpController;
use App\Http\Controllers\MonthlyincoController;
use App\Http\Controllers\MailsController;
use App\Http\Controllers\UserController;



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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => 'auth'] , function(){
    // تصنيفات
   Route::post('addService',[ServiceController::class , 'addService']);
   Route::delete('delete/{id}',[ServiceController::class,"delete"]);
   Route::put('update/{id}',[ServiceController::class , 'update']);

    Route::get('getService/{id?}',[ServiceController::class , 'getService']);

    Route::get('searchSer/{data?}', [ServiceController::class, "searchData"]);



   // مصروفات
    Route::post('addMsrofat',[MsrofatController::class , 'addMsrofat']);
    Route::delete('deleteM/{id}',[MsrofatController::class,"delete"]);
    Route::put('updateM/{id}',[MsrofatController::class , 'updateM']);

    Route::get('getMsrofat/{id?}',[MsrofatController::class , 'getMsrofat']);

    Route::get('Searchms/{data?}', [MsrofatController::class, "Searchms"]);
    Route::get('/searchMS/{data?}',[MsrofatController::class,"search"]);


    // ايرادات
    Route::post('addIncome',[IncomeController::class , 'addIncome']);
    Route::delete('deleteI/{id}',[IncomeController::class,"deleteI"]);
    Route::put('updateI/{id}',[IncomeController::class , 'updateI']);

    Route::get('getIncome/{id?}',[IncomeController::class , 'getIncome']);

    Route::get('searchData/{data?}', [IncomeController::class, "searchData"]);
    Route::get('Search/{data?}', [IncomeController::class, "Search"]);



    // contact
    Route::post('addContact',[ContactController::class , 'addContact']);

    Route::get('getContact',[ContactController::class , 'getContact']);


    //mails
    Route::post('sendMessage',[MailsController::class , 'sendMessage']);
    
    Route::get('getMessage/{id?}',[MailsController::class , 'getMessage']);
    
    Route::get('searchMail/{data?}', [MailsController::class, "searchData"]);



    // logout
    Route::post('Logout', [UserController::class, 'Logout']);
    Route::get('/user', [UserController::class, 'user']);


});










//mails



Route::post('Register', [UserController::class, 'Register']);
Route::post('Login', [UserController::class, 'Login']);

