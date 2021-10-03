<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MymotivzController;
Route::get('/mymotivz/index', [MymotivzController::class, 'index'])->name('mymotivz.index');

Route::get('/job/details',[MymotivzController::class, 'jobDetails'])->name('job.details');
Route::post('/job/details', [MymotivzController::class, 'storeJobDetails'])->name('store.job.details');

Route::get('/job/qualification',[MymotivzController::class, 'jobQualification'])->name('job.qualification');
Route::post('/job/qualification',[MymotivzController::class, 'storeJobQualification'])->name('store.job.qualification');

Route::get('/job/benefits',[MymotivzController::class, 'jobBenefits'])->name('job.benefits');
Route::post('/job/benefits',[MymotivzController::class, 'storeJobBenefits'])->name('store.job.benefits');

Route::get('/job/review', [MymotivzController::class, 'jobReview'])->name('job.review');