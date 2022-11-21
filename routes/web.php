<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    AuthController,
    AuthAdminController,
    DashboardController,
    
};
use App\Http\Controllers\Admin\Auth\AuthAdminLoginController;

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

// Template
Route::get('/', function () {
    return view('/welcome');
});

// Route Login
Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/postlogin', [AuthController::class, 'postlogin'])->name('postlogin');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

// Route Admin
Route::namespace('Admin')->prefix('admin')->name('admin.')->group(function(){
    Route::namespace('Auth')->group(function(){
        //Route Login 
        Route::get('login', [AuthAdminLoginController::class,'create'])->name('login');
        Route::post('login', [AuthAdminLoginController::class,'store'])->name('adminlogin');
    });
});

// Route Register
Route::get('/register', [AuthController::class, 'register'])->name('register');
Route::post('/simpanRegister', [AuthController::class, 'simpanRegister'])->name('simpanRegister');

// Route Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard'); 

// Route Barang
Route::get('/barang/data', [BarangController::class, 'data'])->name('barang.data');
Route::get('/barang/pdf/{id}', [BarangController::class, 'pdf'])->name('barang.pdf');
Route::resource('/barang', BarangController::class);

/// Route Tempat
Route::get('/tempat/data', [TempatController::class, 'data'])->name('tempat.data');
Route::resource('/tempat', TempatController::class);

// Route Kategori
Route::get('/kategori/data', [KategoriController::class, 'data'])->name('kategori.data');
Route::resource('/kategori', KategoriController::class);


