<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MymotivzController;
Route::get('/mymotivz/index', [MymotivzController::class, 'index']);