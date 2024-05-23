<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

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

Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'showDashboard']);
    Route::delete('/admin/destroy', [AdminController::class, 'destroy']);
    Route::get('/admin/search', [AdminController::class, 'search']);
    Route::get('/admin/export', [AdminController::class, 'export']);
});

Route::get('/', [ContactController::class, 'index']);
Route::post('/confirm', [ContactController::class, 'confirm']);
Route::post('/store', [ContactController::class, 'store']);
Route::get('/thanks', [ContactController::class, 'thanks'])->name('thanks');