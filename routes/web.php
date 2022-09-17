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
 // return view('welcome');
  return view('pet.ownerRegister');
});

Route::group(['middleware' => 'auth'], function () {
Route::post('/saveOwner', [OwnerRegController::class, 'saveOwner'])->name('saveOwner');
Route::post('/updateOwner/{id}', [OwnerRegController::class, 'updateOwner'])->name('updateOwner');
Route::post('/deleteOwner/{id}', [OwnerRegController::class, 'deleteOwner'])->name('deleteOwner');
Route::post('/deleteAllOwner', [OwnerRegController::class, 'deleteAllOwner'])->name('deleteAllOwner');
Route::post('/updateOwnerSaved{id}', [OwnerRegController::class, 'updateOwnerSaved'])->name('updateOwnerSaved');
Route::get('/viewOwnerList', [OwnerRegController::class, 'viewOwnerList']);
Route::get('/petOwned/{id}', [PetController::class, 'petOwned'])->name('petOwned');
Route::get('/ownerDashboard/{id}', [OwnerRegController::class, 'ownerDashboard'])->name('ownerDashboard');
Route::resource('pet', PetController::class);
Route::post('/petRegister/{id}' , [PetController::class, 'petRegister'])->name('petRegister');
Route::post('/savePet/{id}', [PetController::class, 'savePet'])->name('savePet');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']); //->name('home');
});


Auth::routes();


Route::get('/appointment', [App\Http\Controllers\AppointmentController::class, 'index']);

Route::get('/appointment', [AppointmentController::class, 'index']);
Route::post('create-appointment', [AppointmentController::class, 'create']);
// Route::post('appointment-update', [AppointmentController::class, 'update']);
// Route::post('appointment-delete', [AppointmentController::class, 'delete']);
