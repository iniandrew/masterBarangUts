<?php

use App\Http\Controllers\BarangController;
use App\Http\Controllers\SatuanController;
use Illuminate\Support\Facades\Route;

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

Route::get('/profile', fn () => view('app.profile', [
    'pageTitle' => 'My Profile',
]))->name('profile');

Route::resource('barang', BarangController::class);
Route::resource('satuan', SatuanController::class);
