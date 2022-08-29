<?php

use App\Http\Controllers\PetController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OwnerRegController;

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
    return view('pet.ownerRegister');
  //  return view('pet.petRegister');
});

Route::post('/saveOwner', [OwnerRegController::class, 'saveOwner'])->name('saveOwner');

Route::resource('pet', PetController::class);
