<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MemberController;
use App\Http\Controllers\PelatihController;
use App\Http\Controllers\PendaftaranController;



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

Route::resource('/pendaftaran', PendaftaranController::class);

Route::resource('/admin/member', MemberController::class);

Route::resource('/admin/pelatih', PelatihController::class);

Route::get('/admin/dashboard', function () {
    return view('admin.home-admin');
});
