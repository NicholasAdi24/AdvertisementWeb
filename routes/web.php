<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IklanController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VisitorController;
use App\Http\Controllers\BannerController;

// Rute untuk halaman utama visitor (index.blade.php)
Route::get('/', function () {
    return view('visitor.indexvisitor'); // Mengarah ke file indexvisitor.blade.php di dalam folder visitor
})->name('visitorpage');

Route::get('/', [VisitorController::class, 'index'])->name('visitorpage');


// Route untuk halaman dashboard, menjadi halaman pertama kali diakses
// Route::get('/', function () {
//     return view('dashboard'); // Mengarahkan ke view dashboard
// })->middleware('auth')->name('dashboard');

// Rute untuk halaman admin (index.blade.php), hanya bisa diakses setelah login
Route::middleware(['auth'])->group(function () {
    Route::get('/admin', [IklanController::class, 'index'])->name('adminpage'); // Menampilkan halaman admin
    Route::resource('iklan', IklanController::class); // Mengatur semua rute CRUD untuk Iklan
    Route::get('/iklan/{id}/delete-image/{image}', [IklanController::class, 'deleteImage'])->name('iklan.deleteImage');
    Route::get('/dashboard', function () {
        return view('dashboard'); // Ganti dengan view dashboard admin jika ada
    })->name('dashboard');

    // Rute untuk Banner CRUD
    Route::resource('banner', BannerController::class); // CRUD untuk Banner

    
    // Menampilkan form edit
    Route::get('/banner/{id}/edit', [BannerController::class, 'edit'])->name('banner.edit');

    // Menyimpan perubahan setelah edit
    Route::put('/banner/{id}', [BannerController::class, 'update'])->name('banner.update');

        // Menampilkan form ganti password
    Route::get('/password/change', [AuthController::class, 'showChangePasswordForm'])->name('password.change');

    // Memproses perubahan password
    Route::post('/password/change', [AuthController::class, 'changePassword'])->name('password.update');

});

// Rute untuk autentikasi (login dan logout)
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AuthController::class, 'login'])->name('login.post');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Rute untuk registrasi
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.post');




// Rute untuk detail iklan yang dapat dilihat oleh pengunjung atau admin
Route::get('/iklan/{iklan}', [IklanController::class, 'showdetail'])->name('iklan.show');

// Route untuk halaman detail item
Route::get('/detailitem/{id}', [VisitorController::class, 'show'])->name('detailitem');





