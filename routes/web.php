

<?php

use Illuminate\Support\Facades\Route;
use GuzzleHttp\Middleware;
use App\Models\Gallery;

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

Route::get('/gallery', function () {
  $images = Gallery::get();
  return view('gallery', compact('images'));
});

Route::get('/attendance', function () {
  return view('attendance');
});


Route::get('/attendance/show', [App\Http\Controllers\AttendanceController::class, 'show'])->name('attendance.show');
Route::post('/attendance/store', [App\Http\Controllers\AttendanceController::class, 'store'])->name('attendance.store');

Route::get('/staffview', [App\Http\Controllers\StaffController::class, 'signin'])->name('staff.signin');
Route::post('/staffview', [App\Http\Controllers\StaffController::class, 'dashboard'])->name('staff.dashboard');

Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth', 'verified']], function () {
  Route::group(['middleware' => ['isClient']], function () {
    Route::get('/appointment', [App\Http\Controllers\AppointmentController::class, 'index'])->name('appointment.index');
    Route::post('/appointment', [App\Http\Controllers\AppointmentController::class, 'store'])->name('appointment.store');
    Route::post('/appointment/edit{id}', [App\Http\Controllers\AppointmentController::class, 'edit'])->name('appointment.edit');
    Route::post('appointment/{id}', [App\Http\Controllers\AppointmentController::class, 'destroy'])->name('appointment.destroy');
  });

  Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
  Route::get('/pet', [App\Http\Controllers\PetController::class, 'index'])->name('pet.index');
  Route::get('/pet/create', [App\Http\Controllers\PetController::class, 'create'])->name('pet.create');
  Route::post('/pet/create', [App\Http\Controllers\PetController::class, 'store'])->name('pet.store');
  Route::post('/pet/edit/{id}', [App\Http\Controllers\PetController::class, 'edit'])->name('pet.edit');
  Route::post('/pet/edited/{id}', [App\Http\Controllers\PetController::class, 'edited'])->name('pet.edited');
  Route::post('/pet/delete/{id}', [App\Http\Controllers\PetController::class, 'delete'])->name('pet.delete');
  Route::delete('pet/{id}', [App\Http\Controllers\PetController::class, 'destroy'])->name('pet.destroy');

  Route::get('/staff', [App\Http\Controllers\StaffController::class, 'index'])->name('staff.index');

  Route::get('/staff/show', [App\Http\Controllers\StaffController::class, 'show'])->name('staff.show');
  Route::get('/staff/create', [App\Http\Controllers\StaffController::class, 'create'])->name('staff.create');
  Route::post('/staff/store', [App\Http\Controllers\StaffController::class, 'store'])->name('staff.store');
  Route::post('/staff/edit/{employee_no}', [App\Http\Controllers\StaffController::class, 'edit'])->name('staff.edit');
  Route::post('/staff/edited/{employee_no}', [App\Http\Controllers\StaffController::class, 'edited'])->name('staff.edited');
  Route::post('/staff/delete/{employee_no}', [App\Http\Controllers\StaffController::class, 'delete'])->name('staff.delete');
});


Route::group(['middleware' => ['auth', 'verified', 'isAdmin']], function () {
  Route::get('admin/gallery', [App\Http\Controllers\GalleryController::class, 'index'])->name('gallery.index');
  Route::post('admin/gallery', [App\Http\Controllers\GalleryController::class, 'store'])->name('gallery.store');
  Route::delete('admin/gallery/{id}', [App\Http\Controllers\GalleryController::class, 'destroy'])->name('gallery.destroy');

  Route::get('admin/list_of_appointment', [App\Http\Controllers\AppointmentController::class, 'list_of_appointment'])->name('admin.list_of_appointment');
});
