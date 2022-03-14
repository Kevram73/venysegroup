<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MembreController;

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
Route::get('employees','App\Http\Controllers\EmployeeController@index');
Route::get('add-employee', 'App\Http\Controllers\EmployeeController@create');
/** Resources pour le CRUD sur les membres */
Route::get('membres', 'App\Http\Controllers\MembreController@index');
Route::get('add-membre', 'App\Http\Controllers\MembreController@create');
Route::post('save-membre', 'App\Http\Controllers\MembreController@store')->name('save-membre');
/**
 * Routes de test sur venyse
 */
Route::get('add', 'App\Http\Controllers\VenyseController@create');
Route::post('add-venyse','App\Http\Controllers\VenyseController@store')->name('add-venyse');
Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/**
   * Logout Route
*/
Route::get('/logout', 'App\Http\Controllers\LogoutController@perform')->name('logout.perform');