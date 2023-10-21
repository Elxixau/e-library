<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\BukuController;
use App\Http\Controllers\HomeController;
use App\Models\Buku;

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



Route::get('/', [HomeController::class, 'home'])->name('home');
Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery');
Route::get('/home/selengkapnya', [HomeController::class, 'more'])->name('more');


Route::get('/search', [BukuController::class, 'cari'])->name('cari');
Route::get('/login', [SessionController::class, 'index'])->name('log');
Route::post('/login/authentication', [SessionController::class, 'login']);
Route::post('/logout', [SessionController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    
    Route::get('/admin/anggota', [AdminController::class, 'member'])->name('member');
    Route::get('/admin/anggota/create', [AdminController::class, 'create'])->name('add');
    Route::post('/admin/anggota', [AdminController::class, 'store'])->name('member.store');
    Route::get('/admin/anggota/{id}/update', [AdminController::class, 'edit'])->name('change');
    Route::put('/admin/anggota/{id}', [AdminController::class, 'update'])->name('member.update');
    Route::delete('/admin/anggota/{id}', [AdminController::class, 'destroy'])->name('member.delete');

    Route::get('/admin/buku', [AdminController::class, 'buku'])->name('buku');
    Route::get('/admin/buku/create', [BukuController::class, 'create'])->name('upload');
    Route::post('/admin/buku', [BukuController::class, 'store'])->name('buku.store');
    Route::get('/admin/buku/{id}/update', [BukuController::class, 'edit'])->name('edit');
    Route::put('/admin/buku/{id}', [BukuController::class, 'update'])->name('buku.update');
    Route::delete('/admin/buku/{id}', [BukuController::class, 'destroy'])->name('buku.delete');
    Route::get('/admin/buku/filter', [BukuController::class, 'filter'])->name('filter');
});

Route::get('/download/{id}', [BukuController::class,'download'])->name('book.download');

Route::get('/search/buku', [BukuController::class, 'search'])->name('search');





