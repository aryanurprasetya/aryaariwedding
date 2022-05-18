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

Auth::routes([
    'register' => false, // Registration Routes...
    'reset' => false, // Password Reset Routes...
    'verify' => false, // Email Verification Routes...
]);

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('/');
Route::post('/wishes', [App\Http\Controllers\HomeController::class, 'wish_proses'])->name('wishes');
// Route::get('/mail', [App\Http\Controllers\HomeController::class, 'mail'])->name('mail');


Route::get('/home', [App\Http\Controllers\AdminController::class, 'index'])->name('home');
Route::get('/approve/{id}', [App\Http\Controllers\AdminController::class, 'approve'])->name('approve');
Route::get('/decline/{id}', [App\Http\Controllers\AdminController::class, 'decline'])->name('decline');
Route::get('/hapus/{id}', [App\Http\Controllers\AdminController::class, 'hapus'])->name('hapus');
