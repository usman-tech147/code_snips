<?php

use App\Http\Controllers\MusicController;
use App\Http\Controllers\MusicDatatableController;
use App\Http\Controllers\MusicPieChartController;

//songs pagination using ajax
Route::get('/music/index',[MusicController::class, 'index'])->name('index');
Route::get('/song/filters',[MusicController::class, 'songsFilter'])->name('songs-filters');
Route::get('/update/songs/date',[MusicController::class, 'updateSongsDate']);


//songs datatable
Route::get('music/datatable',[MusicDatatableController::class, 'index'])->name('datatable-index');
Route::post('/ajax/songs/datatable/get-records',[MusicDatatableController::class, 'ajaxGetSongs'])->name('ajax-datatable-get-songs');

//songs piechart
Route::get('music/piechart',[MusicPieChartController::class, 'index'])->name('piechart-index');
Route::get('/ajax/songs/statistics',[MusicPieChartController::class, 'ajaxSongsStatistics'])->name('ajax-piechart-songs-statistics');




