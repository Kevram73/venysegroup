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

/**
 * Authentication routes
 */
Route::get('profile','App\Http\Controllers\Auth\ProfileController@profile')->middleware('auth');

Route::get('/', function () {
    return view('welcome');
});

Route::get('index', function(){
    return view('venyse/dashboard');
});
/**
 * Resources pour le CRUD sur les membres  (nouveau employes)
 **/
Route::get('membres', 'App\Http\Controllers\MembreController@index');
Route::get('add-membre', 'App\Http\Controllers\MembreController@create');
Route::post('save-membre', 'App\Http\Controllers\MembreController@store')->name('save-membre');
/**
 * Routes de test sur venyse
 */
Route::get('add', 'App\Http\Controllers\VenyseController@create');
Route::post('add-venyse','App\Http\Controllers\VenyseController@store')->name('add-venyse');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/**
* Logout Route
*/
Route::get('/logout', 'App\Http\Controllers\LogoutController@perform')->name('logout.perform');
/**
 * Resources pour les employe(e)s de venyse groupe
 */
Route::get('employes','App\Http\Controllers\EmployesController@index');
Route::get('add-employes','App\Http\Controllers\EmployesController@showForm');
Route::post('save-employes','App\Http\Controllers\EmployesController@store');
Route::get('edit-employes/{id}', 'App\Http\Controllers\EmployesController@show');
Route::post('edit-employes/{id}','App\Http\Controllers\EmployesController@update');

/**
 * Resources pour les traders
 */
Route::get('traders','App\Http\Controllers\TraderController@index');
Route::get('add-trader','App\Http\Controllers\TraderController@showForm');
Route::get('completer-profile', 'App\Http\Controllers\TraderController@updateProfileForm');
Route::post('completer-profile','App\Http\Controllers\TraderController@updateProfile');
Route::get('edit-traders/{id}','App\Http\Controllers\TraderController@show');
Route::post('edit-trader/{id}','App\Http\Controllers\TraderController@validation');
/**
 * Resources pour la section forum
 */
Route::get('forum','App\Http\Controllers\ForumController@index');
Route::post('forum','App\Http\Controllers\ForumController@create');

/**
 * Resources pour la gestion dees statistiques
 * */
