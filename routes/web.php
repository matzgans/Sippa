<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{CategorylaporanController, PendampingController, KecamatanController, LaporanController, LoginController};
use App\Models\{Laporan, Pendamping, Kecamatan, Category_laporan};

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

Route::get('/', function () {
    $jum_laporan = Laporan::count();
    $jum_pendamping = Pendamping::count();
    $kecamatan = Kecamatan::count();
    $category = Category_laporan::count();
    return view('welcome', compact('jum_laporan', 'jum_pendamping', 'kecamatan', 'category'));
})->middleware('auth');


Route::group(['middleware' => ['auth', 'hakakses:admin']], function(){
    // category
    Route::get('/index/category', [CategorylaporanController::class, 'category'])->name('category');
    Route::get('/create/category', [CategorylaporanController::class, 'create']);
    Route::post('/store/category', [CategorylaporanController::class, 'store']);
    Route::get('/hapus/category/{id}', [CaegorylaporanController::class, 'hapus']);

    // pendamping
    Route::get('/index/pendamping', [PendampingController::class, 'pendamping'])->name('pendamping');
    Route::get('/create/pendamping', [PendampingController::class, 'create']);
    Route::post('/store/pendamping', [PendampingController::class, 'store']);

    // kecamatan
    Route::get('/index/kecamatan', [KecamatanController::class, 'kecamatan'])->name('kecamatan');
    Route::get('/create/kecamatan', [KecamatanController::class, 'create']);
    Route::post('/store/kecamatan', [KecamatanController::class, 'store']);

    // laporan
    Route::get('/index/laporan', [LaporanController::class, 'laporan'])->name('laporan');
    Route::get('/create/laporan', [LaporanController::class, 'create']);
    Route::post('/store/laporan', [LaporanController::class, 'store']);
    Route::get('/tampil/laporan/{id}', [LaporanController::class, 'tampil']);
    Route::get('/hapus/laporan/{id}', [LaporanController::class, 'hapus']);
});


// login
Route::get('/register', [LoginController::class, 'register']);
Route::post('/registerproses', [LoginController::class, 'registerproses']);
Route::get('/login', [LoginController::class, 'login'])->name('login');
Route::post('/loginproses', [LoginController::class, 'loginproses']);
Route::get('/logout', [LoginController::class, 'logout']);