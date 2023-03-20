<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DatabaseController;


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


// Vue Route..
  Route::get('/{any}', [ApplicationController::class, 'index'])->where('any', '.*');

