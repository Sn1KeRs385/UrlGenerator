<?php

use App\Http\Controllers\UrlController;
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

Route::get('/', [UrlController::class, 'createForm'])->name('url.createForm');
Route::get('/{link}', [UrlController::class, 'linkRedirect'])->name('url.linkRedirect');
Route::get('/stats/{url:stat_link}', [UrlController::class, 'stats'])->name('url.stats');
