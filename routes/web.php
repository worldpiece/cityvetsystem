<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\OwnerRegController;
use App\Http\Controllers\AppointmentController;


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
  //  return view('pet.petRegister');
});

Route::post('/saveOwner', [OwnerRegController::class, 'saveOwner'])->name('saveOwner');

Route::resource('pet', PetController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']); //->name('home');
Route::get('/appointment', [App\Http\Controllers\AppointmentController::class, 'index']);

Route::get('/appointment', [AppointmentController::class, 'index']);
Route::post('create-appointment', [AppointmentController::class, 'create']);
// Route::post('appointment-update', [AppointmentController::class, 'update']);
// Route::post('appointment-delete', [AppointmentController::class, 'delete']);
