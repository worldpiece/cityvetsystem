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
 // return view('welcome');
  return view('pet.owner-register');
});

// Route::group(['middleware' => 'auth'], function () {
Route::post('/saveOwner', [OwnerRegController::class, 'saveOwner'])->name('saveOwner');
Route::post('/updateOwner/{id}', [OwnerRegController::class, 'updateOwner'])->name('updateOwner');
Route::post('/deleteOwner/{id}', [OwnerRegController::class, 'deleteOwner'])->name('deleteOwner');
Route::post('/deleteAllOwner', [OwnerRegController::class, 'deleteAllOwner'])->name('deleteAllOwner');
Route::post('/updateOwnerSaved{id}', [OwnerRegController::class, 'updateOwnerSaved'])->name('updateOwnerSaved');
Route::get('/viewClientList', [OwnerRegController::class, 'viewOwnerList']);
Route::get('/petOwned/{id}', [PetController::class, 'petOwned'])->name('petOwned');
Route::get('/ownerDashboard/{id}', [OwnerRegController::class, 'ownerDashboard'])->name('ownerDashboard');
Route::resource('pet', PetController::class);
Route::post('/petRegister/{id}' , [PetController::class, 'petRegister'])->name('petRegister');
Route::post('/savePet/{id}', [PetController::class, 'savePet'])->name('savePet');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']); //->name('home');
Route::post('/updatePet/{id}', [PetController::class, 'updatePet'])->name('updatePet');
Route::post('/deletePet/{id}', [PetController::class, 'deletePet'])->name('deletePet');
Route::post('/updatePetSaved{id}', [PetController::class, 'updatePetSaved'])->name('updatePetSaved');
// });




Route::get('/appointment', [App\Http\Controllers\AppointmentController::class, 'index']);

  // Route::get('/records', 'RecordController@index')->name('records')->middleware('auth');
  // Route::get('/addrecord', 'AddRecordController@index')->name('addrecord')->middleware('auth');
  // Route::post('/addrecord', 'AddRecordController@store')->name('addrecord')->middleware('auth');
  // Route::get('/action', 'RecordController@action')->name('record.action');
