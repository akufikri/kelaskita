<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\JoinKelasController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\PengaturanController;
use App\Http\Controllers\PengumpulanTugasController;
use App\Http\Controllers\TugasController;
use App\Models\PengumpulanTugas;
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
Route::middleware(['web'])->group(function () {
    Route::get('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/login/proses', [AuthController::class, 'prosses_login']);

    Route::post('/register/proses', [AuthController::class,'proses_register']);
    Route::get('/register', [AuthController::class, 'register']);
    
    // Routes that require authentication
    Route::middleware(['auth'])->group(function () {
        Route::get('/', [HomeController::class,'home']);
        Route::post('/kelas/create', [KelasController::class, 'create']);
        Route::post('/kelas/join', [JoinKelasController::class,'join']);
        Route::get('/u/{id}', [JoinKelasController::class, 'detail_join'])->name('u');
        Route::get('/t/{id}', [KelasController::class, 'detail_kelas'])->name('t');
        Route::post('/create_tugas/{id}', [TugasController::class, 'create_tugas']);
        Route::get('/preview/{id}', [PengumpulanTugasController::class,'preview']);
        Route::post('/store/task/{id}', [PengumpulanTugasController::class,'pengumpulan']);
        Route::get('/user/pengaturan', [PengaturanController::class,'index']);
        Route::put('/user/pengaturan/update', [PengaturanController::class,'update'])->name('user.update');
        Route::get('/user/tugas', [TugasController::class,'index']);
        Route::post('/update/nilai/{id}', [TugasController::class,'updateNilai'])->name('update.nilai');
        Route::post('/send_url', [TugasController::class, 'send_url']);
        Route::post('/send_document', [TugasController::class, 'send_document'])->name('send_document');
        Route::get('/t/delete/{id}', [TugasController::class, 'deleteTugas']);
    });
    
    // Logout route
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});