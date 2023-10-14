<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/', [\App\Http\Controllers\DieselConsumptionController::class, 'create'])->middleware('auth')->name('home');
Route::post('/diesel', [\App\Http\Controllers\DieselConsumptionController::class, 'store'])->middleware('auth')->name('store');
Route::post('/destroy', [\App\Http\Controllers\DieselConsumptionController::class, 'destroy'])->middleware('auth')->name('diesel-consumption.destroy');
Route::get('/edit', [\App\Http\Controllers\DieselConsumptionController::class, 'edit'])->middleware('auth')->name('diesel-consumption.edit');
Route::post('/update', [\App\Http\Controllers\DieselConsumptionController::class, 'update'])->middleware('auth')->name('diesel-consumption.update');

