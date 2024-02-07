<?php

use App\Http\Controllers\MixueController;
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

Route::get('/', function () {
    return view('homePage');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/map', [App\Http\Controllers\MapController::class, 'index'])->name('map');

Auth::routes();

Route::get('/home', function() {
    return view('home');
})->name('home')->middleware('auth');

Route::get('/maps', function() {
    return view('maps/index');
})->name('maps')->middleware('auth');

// Route::get('/tesmap', function() {
//     return view('tesmap');
// })->name('tesmap')->middleware('auth');

Route::resource('sekolahs', \App\Http\Controllers\SekolahController::class)->middleware('auth');

Route::resource('mixues', \App\Http\Controllers\MixueController::class)->middleware('auth');

Route::resource('polygons', \App\Http\Controllers\PolygonController::class)->middleware('auth');

// Route::get('/mixues', [App\Http\Controllers\MixueController::class, 'index'])->name('mixues')->middleware('auth');