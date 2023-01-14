<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;


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


Route::get('/',[UserController::Class,'index']);
Route::post('insert',[UserController::Class,'insert'])->name('insert');
Route::patch('update',[UserController::Class,'update'])->name('update');
Route::delete('delete',[UserController::Class,'delete'])->name('delete');
