<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
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

Route::group(['prefix' => '/', 'middleware' => 'auth'], function () {
    Route::any('client/search', [ClientController::class, 'search'])->name('client.search');
    Route::resource('client', ClientController::class);
    Route::get('export/xlsx', [ClientController::class, 'exportToXlsx'])->name('client.export.xlsx');

    Route::get('/admin', [DashboardController::class, 'index'])->name('admin');
    Route::get('/home', [DashboardController::class, 'index'])->name('home');
});

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
