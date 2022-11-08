<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NoteController;

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

Route::get('/', [NoteController::class, 'index']);
//Route::get('/_debugbar/assets/stylesheets', [
//    'as' => 'debugbar-css',
//    'uses' => '\Barryvdh\Debugbar\Controllers\AssetController@css'
//]);
//
//Route::get('/_debugbar/assets/javascript', [
//    'as' => 'debugbar-js',
//    'uses' => '\Barryvdh\Debugbar\Controllers\AssetController@js'
//]);
//
//Route::get('/_debugbar/open', [
//    'as' => 'debugbar-open',
//    'uses' => '\Barryvdh\Debugbar\Controllers\OpenController@handler'
//]);
