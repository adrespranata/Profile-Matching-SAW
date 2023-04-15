<?php

// Auth
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
// Data
use App\Http\Controllers\UserController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\NilaiController;
use App\Http\Controllers\BobotController;
// Profile Matching
use App\Http\Controllers\ProfileMatching\ProfileMatchingKriteriaController;
use App\Http\Controllers\ProfileMatching\ProfileMatchingSubKriteriaController;
use App\Http\Controllers\ProfileMatching\ProfileMatchingBobotGapController;
use App\Http\Controllers\ProfileMatching\ProfileMatchingHasilAkhirController;
use App\Http\Controllers\SimpleAdditiveWeighting\sawHasilAkhirController;
// Simple Additive Weighting
use App\Http\Controllers\SimpleAdditiveWeighting\sawKriteriaController;
use App\Http\Controllers\SimpleAdditiveWeighting\sawSubKriteriaController;
// Route
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

// Login
Route::get('/login', [LoginController::class, 'LoginForm'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);

// Dashboard
Route::get('/', [DashboardController::class, 'index'])->middleware('auth');

// Administrator
Route::group(['middleware' => ['auth', 'role:1, 2']], function () {
    // Users
    Route::get('/user', [UserController::class, 'index'])->name('user.index');
    Route::get('/user/create', [UserController::class, 'create'])->name('user.create');
    Route::post('/user', [UserController::class, 'store'])->name('user.store');
    Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit');
    Route::put('/user/{id}', [UserController::class, 'update'])->name('user.update');
    Route::delete('/user/{id}', [UserController::class, 'destroy'])->name('user.destroy');

    // Siswa
    Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
    Route::get('/siswa/create', [SiswaController::class, 'create'])->name('siswa.create');
    Route::post('/siswa', [SiswaController::class, 'store'])->name('siswa.store');
    Route::get('/siswa/{id}/edit', [SiswaController::class, 'edit'])->name('siswa.edit');
    Route::put('/siswa/{id}', [SiswaController::class, 'update'])->name('siswa.update');
    Route::delete('/siswa/{id}', [SiswaController::class, 'destroy'])->name('siswa.destroy');

    //Nilai Siswa
    Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai.index');
    Route::get('/nilai/create', [NilaiController::class, 'create'])->name('nilai.create');
    Route::post('/nilai', [NilaiController::class, 'store'])->name('nilai.store');
    Route::get('/nilai/{id}/edit', [NilaiController::class, 'edit'])->name('nilai.edit');
    Route::put('/nilai/{id}', [NilaiController::class, 'update'])->name('nilai.update');
    Route::delete('/nilai/{id}', [NilaiController::class, 'destroy'])->name('nilai.destroy');

    // Bobot
    Route::get('/bobot', [BobotController::class, 'index'])->name('bobot.index');
    Route::get('/bobot/create', [BobotController::class, 'create'])->name('bobot.create');
    Route::post('/bobot', [BobotController::class, 'store'])->name('bobot.store');
    Route::get('/bobot/{id}/edit', [BobotController::class, 'edit'])->name('bobot.edit');
    Route::put('/bobot/{id}', [BobotController::class, 'update'])->name('bobot.update');
    Route::delete('/bobot/{id}', [BobotController::class, 'destroy'])->name('bobot.destroy');

    Route::resource('pmkriteria', ProfileMatchingKriteriaController::class);
    Route::resource('pmsubkriteria', ProfileMatchingSubKriteriaController::class);
    Route::resource('pmbobotgap', ProfileMatchingBobotGapController::class);
    Route::resource('pmhasil', ProfileMatchingHasilAkhirController::class);

    Route::resource('sawkriteria', sawKriteriaController::class);
    Route::resource('sawsubkriteria', sawSubKriteriaController::class);
    Route::resource('sawhasil', sawHasilAkhirController::class);
});

// Logout
Route::post('/logout', [LoginController::class, 'logout']);
