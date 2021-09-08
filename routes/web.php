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


Route::post('/', [\App\Http\Controllers\UrlController::class, 'generateUrl'])->name('generateUrl');
Route::get('/', [\App\Http\Controllers\UrlController::class, 'getUrl'])->name('getUrl');
Route::get('/stat', [\App\Http\Controllers\StatisticController::class, 'index'])->name('stat');
Route::get('/stat/url/{urlId}', [\App\Http\Controllers\StatisticController::class, 'url'])->name('urlId');
Route::get('/stat/ip_aress/{urlIp}', [\App\Http\Controllers\StatisticController::class, 'urlIp'])->name('urlIp');
Route::get('/stat/user_agent/{urlUserAgent}', [\App\Http\Controllers\StatisticController::class, 'urlUserAgent'])->name('urlUserAgent');
Route::get('/{generatedUrl}',[\App\Http\Controllers\RedirectController::class, 'redirectUrl'])->name('redirect');
