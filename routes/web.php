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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/uri/index', [\App\Http\Controllers\Uri\UriController::class, 'index'])->name('uri.index');
Route::post('/uri/post', [\App\Http\Controllers\Uri\UriController::class, 'post'])->name('uri.post');

Route::get('/go/{srt}', [\App\Http\Controllers\Uri\UriController::class, 'go'])->name('uri.go');
Route::get('/go/{srt}/info', [\App\Http\Controllers\Uri\UriController::class, 'info'])->name('uri.go.info');