<?php

use App\Http\Controllers\cs\NasabahController;
use App\Http\Controllers\cs\SDBController;
use App\Http\Controllers\cs\KunjunganController;
use App\Http\Controllers\cs\SDBdisewaController;

;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pimpinan\PimpinanSDBController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('cs')->middleware('isCS')->group(function(){
    Route::resource('nasabah', NasabahController::class);
    Route::resource('sdb', SDBController::class);
    Route::resource('kunjungan', KunjunganController::class);
    Route::resource('sdbsewsa', SDBdisewaController::class);

});

Route::prefix('pimpinan')->middleware('isPimpinan')->group(function(){
    Route::resource('sdbsewa', PimpinanSDBController::class);
});
