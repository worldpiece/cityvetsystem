<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\OwnerRegController;
use App\Http\Controllers\AppointmentController;
use GuzzleHttp\Middleware;

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

// Route::post('/saveOwner', [OwnerRegController::class, 'saveOwner'])->name('saveOwner');
// Route::resource('pet', PetController::class);

Auth::routes();


Route::group(['middleware' => 'auth'], function () {


  // Route::get('register-client', [App\Http\Controllers\ClientController::class, 'index'])->name('register-client');
  Route::get('/appointment', [App\Http\Controllers\AppointmentController::class, 'index'])->name('appointment.index');
  Route::post('/appointment', [App\Http\Controllers\AppointmentController::class, 'store'])->name('appointment.store');

  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

  // Route::group(['middleware' => 'RoleAdmin'], function () {

  // });
  //Gallery Routes
  Route::get('/gallery', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index');
  Route::post('/gallery', [App\Http\Controllers\GalleryController::class, 'store'])->name('gallery.store');
  Route::delete('/gallery/{id}', [App\Http\Controllers\GalleryController::class, 'destroy'])->name('gallery.destroy');

  // Route::group(['middleware' => 'RoleClient'], function (){
  //Pet Routes
  Route::get('/pet', [App\Http\Controllers\PetController::class, 'index'])->name('pet.index');
  // Route::get('/pet', [App\Http\Controllers\PetController::class, 'index'])->name('pet.register');
  Route::post('/pet', [App\Http\Controllers\PetController::class, 'store'])->name('pet.store');
  // Route::get('client-register', [App\Http\Controllers\PetController::class, 'register'])->name('pet.);
  // Route::get('pet', [App\Http\Controllers\PetController::class, 'index'])->name('pet.index');
  // });


});










  // Route::get('/appointment', [App\Http\Controllers\AppointmentController::class, 'index']);
  // Route::put('appointment-update', [AppointmentController::class, 'update']);
  // Route::delete('appointment-delete', [AppointmentController::class, 'delete']);

  // Route::get('/records', 'RecordController@index')->name('records')->middleware('auth');
  // Route::get('/addrecord', 'AddRecordController@index')->name('addrecord')->middleware('auth');
  // Route::post('/addrecord', 'AddRecordController@store')->name('addrecord')->middleware('auth');
  // Route::get('/action', 'RecordController@action')->name('record.action');
