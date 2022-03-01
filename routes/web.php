<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', function(){
    return view('venyse/dashboard');
});
/**
 * Routes for Registration and login for employee
 */
//Route::get('employees',[EmployeeController::class]);
Route::get('employee','App\Http\Controllers\EmployeeController@create');
