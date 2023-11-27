<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\urlController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Route::get('generate-short-link',[urlController::class, 'index']);
Route::post('generate-short-link',[urlController::class, 'store'])->name('generate.short.link.post');
Route::get('{code}', [urlController::class, 'shortLink'])->name('short.link');
