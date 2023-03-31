<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\EmailController;


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

  

// DatabaseController
  Route::post('/uploadfile', [DatabaseController::class, 'fileUpload']);
  Route::post('/recievegood', [EmailController ::class, 'Saveresult']);


// Vue Route..
  Route::get('/{any}', [ApplicationController::class, 'index'])->where('any', '.*');

