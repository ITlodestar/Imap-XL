<?php



use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\KeywordController;
use App\Http\Controllers\WorkertaskController;

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
  Route::get('/api/getDatabase', [DatabaseController::class, 'getdatabase']);
  Route::post('/api/process', [DatabaseController::class, 'setProgress']);
  Route::post('/uploadfile', [DatabaseController::class, 'fileUpload']);
// KeyworksController
  Route::get('/api/getKeywords', [KeywordController::class, 'getkeywords']);
// WorktaskController
  Route::get('/getworktasks/{id}', [WorkertaskController::class, 'getWorktask']);
// Vue Route..
  Route::get('/{any}', [ApplicationController::class, 'index'])->where('any', '.*');

