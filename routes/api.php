<?php


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DatabaseController;
use App\Http\Controllers\KeywordController;
use App\Http\Controllers\SettingsController;
use App\Http\Controllers\WorkertaskController;



/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// KeyworksController
Route::get('/getKeywords', [KeywordController::class, 'getkeywords']);
Route::post('/addKeywords', [KeywordController::class, 'addkeywords']);
Route::post('/deleteKeywords', [KeywordController::class, 'deleteKeywords']);
// DatabaseController
Route::get('/getDatabase', [DatabaseController::class, 'getdatabase']);
Route::post('/process', [DatabaseController::class, 'setProgress']);

// WorktaskController
Route::get('/getworktasks/{id}', [WorkertaskController::class, 'getallWorktasks']);
Route::get('/deleteworktasks/{id}', [WorkertaskController::class, 'deleteworktasks']);
Route::get('/getworktask', [WorkertaskController::class, 'getWorktask']);

// UserController
Route::post('/login', [UserController::class, 'loginuser']);
Route::post('/addUser', [UserController::class, 'adduser']);
Route::get('/getUser', [UserController::class, 'getuser']);

// SettingsController
Route::get('/getallsettings', [SettingsController::class, 'getSettings']);
Route::post('/editsetting', [SettingsController::class, 'editsetting']);
