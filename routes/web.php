<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CodeSnippetsController;
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

Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/single/image', [App\Http\Controllers\CodeSnippetsController::class, 'singleImage'])->name('single.image');
Route::get('/simple-form-validation', function (){
    return view('simple_form_validation');
});

Route::post('/submit-form', [App\Http\Controllers\CodeSnippetsController::class, 'submitForm'])->name('submit.form');

Route::get('/display-date-and-time',[\App\Http\Controllers\DateAndTimeController::class, 'getDateAndTime'])->name('get.date-and-time');
Route::get('/date-and-time', [\App\Http\Controllers\DateAndTimeController::class, 'dateAndTimeForm' ])->name('date-and-time');
Route::post('/date-and-time/form', [\App\Http\Controllers\DateAndTimeController::class, 'submitDateAndTimeForm' ])->name('submit.date-and-time');

Route::get('/monthly-dates',[\App\Http\Controllers\DateAndTimeController::class, 'monthlyDates' ])->name('monthly.dates');
Route::post('/get-monthly-dates',[\App\Http\Controllers\DateAndTimeController::class, 'getMonthlyDates' ])->name('get.monthly.dates');

Route::get('/music-index',[\App\Http\Controllers\DatatableController::class, 'index'])->name('music-index');
Route::post('/songs-record',[\App\Http\Controllers\DatatableController::class, 'getSongsRecord'])->name('songs-record');
Route::get('/edit-song/{id}',[\App\Http\Controllers\DatatableController::class,'editSong'])->name('edit-song');

Route::get('/google-map',[\App\Http\Controllers\MapController::class, 'googleMap'])->name('google.map');

