

<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PetController;
use App\Http\Controllers\OwnerRegController;
use App\Http\Controllers\AppointmentController;
use App\Models\Pet;
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

Route::get('/services', function () {
  return view('services');
});

// Route::post('/saveOwner', [OwnerRegController::class, 'saveOwner'])->name('saveOwner');
// Route::resource('pet', PetController::class);

Auth::routes(['verify' => true]);


Route::group(['middleware' => ['auth', 'verified']], function () {
  Route::get('appointment', [App\Http\Controllers\AppointmentController::class, 'index'])->name('appointment.index');
  Route::post('appointment', [App\Http\Controllers\AppointmentController::class, 'store'])->name('appointment.store');
  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

  // Route::group(['middleware' => 'RoleAdmin'], function () {

  // });
  //Gallery Routes
  Route::get('gallery', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index');
  Route::post('gallery', [App\Http\Controllers\GalleryController::class, 'store'])->name('gallery.store');
  Route::delete('gallery/{id}', [App\Http\Controllers\GalleryController::class, 'destroy'])->name('gallery.destroy');

  Route::get('/pet', [App\Http\Controllers\PetController::class, 'index'])->name('pet.index');
  Route::get('/pet/create', [App\Http\Controllers\PetController::class, 'create'])->name('pet.create');
  Route::post('/pet/create', [App\Http\Controllers\PetController::class, 'store'])->name('pet.store');
  Route::delete('pet/{id}', [App\Http\Controllers\PetController::class, 'destroy'])->name('pet.destroy');

  //Client Routes
  Route::get('/client', [App\Http\Controllers\ClientController::class, 'index'])->name('client.index');
});





// Route::get('/appointment', [App\Http\Controllers\AppointmentController::class, 'index']);
// Route::put('appointment-update', [AppointmentController::class, 'update']);
// Route::delete('appointment-delete', [AppointmentController::class, 'delete']);

// Route::get('/records', 'RecordController@index')->name('records')->middleware('auth');
// Route::get('/addrecord', 'AddRecordController@index')->name('addrecord')->middleware('auth');
// Route::post('/addrecord', 'AddRecordController@store')->name('addrecord')->middleware('auth');
// Route::get('/action', 'RecordController@action')->name('record.action');