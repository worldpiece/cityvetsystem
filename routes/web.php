

<?php

use Illuminate\Support\Facades\Route;
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

Route::get('/welcome', function () {
  return view('welcome');
});

Route::get('/services', function () {
  return view('services');
});

Route::get('/aboutus', function () {
  return view('aboutus');
});

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {
  Route::get('appointment', [App\Http\Controllers\AppointmentController::class, 'index'])->name('appointment.index');
  Route::post('appointment', [App\Http\Controllers\AppointmentController::class, 'store'])->name('appointment.store');
  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);

  Route::get('/pet', [App\Http\Controllers\PetController::class, 'index'])->name('pet.index');
  Route::get('/pet/create', [App\Http\Controllers\PetController::class, 'create'])->name('pet.create');
  Route::post('/pet/create', [App\Http\Controllers\PetController::class, 'store'])->name('pet.store');
  Route::post('/pet/edit/{id}', [App\Http\Controllers\PetController::class, 'edit'])->name('pet.edit');
  Route::post('/pet/edited/{id}', [App\Http\Controllers\PetController::class, 'edited'])->name('pet.edited');
  Route::post('/pet/delete/{id}', [App\Http\Controllers\PetController::class, 'delete'])->name('pet.delete');
  Route::delete('pet/{id}', [App\Http\Controllers\PetController::class, 'destroy'])->name('pet.destroy');

  //Client Routes
  Route::get('/client', [App\Http\Controllers\ClientController::class, 'index'])->name('client.index');
});


Route::group(['middleware' => ['auth', 'verified', 'isAdmin']], function () {
  Route::get('admin/gallery', [App\Http\Controllers\GalleryController::class, 'index'])->name('admin.gallery.index');
  Route::post('admin/gallery', [App\Http\Controllers\GalleryController::class, 'store'])->name('admin.gallery.store');
  Route::delete('admin/gallery/{id}', [App\Http\Controllers\GalleryController::class, 'destroy'])->name('admin.gallery.destroy');
});
