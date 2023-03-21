<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ConvertPdfToWordController;
use App\Http\Controllers\ConvertController;
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
Route::get("/" ,[ConvertPdfToWordController::class,'create'])->name('index');
Route::post("/" ,[ConvertPdfToWordController::class,'store'])->name('store');
Route::get('/convert', [ConvertController::class,'convertPdfToWord2']);