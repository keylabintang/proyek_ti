<?php

use App\Http\Controllers\BannerController;
use App\Http\Controllers\BiayaController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\FaqController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PrestasiController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\TentangController;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

// Admin

Route::get('/admin', function () {
    return view('admin.home-admin');
});

Route::resource('/pendaftaran', PendaftaranController::class);

Route::resource('/admin/member', MemberController::class);

Route::resource('/admin/pelatih', PelatihController::class);

Route::resource('/admin/jadwal', JadwalController::class);

Route::resource('/admin/program', ProgramController::class);

Route::resource('/admin/event', EventController::class);

Route::resource('/admin/biaya', BiayaController::class);

Route::resource('/admin/banner', BannerController::class);

Route::resource('/admin/tentang', TentangController::class);

Route::resource('/admin/prestasi', PrestasiController::class);

Route::resource('/admin/faq', FaqController::class);

Route::resource('/admin/kontak', KontakController::class);


// User
Route::get('/user', function () {
    return view('user.home-user');
});
