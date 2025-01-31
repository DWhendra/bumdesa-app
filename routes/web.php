<?php

use App\Http\Controllers\HasilEvaluasiController;
use App\Models\Kelembagaan;
use Illuminate\Support\Facades\DB;
use App\Models\KerjasamaDanInovasi;
use App\Models\KeuntunganDanManfaat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ALKAController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\BUMDesaController;
use App\Http\Controllers\EvaluasiController;
use App\Http\Controllers\IndikatorController;
use App\Http\Controllers\ManajemenController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\PoinAspekController;
use App\Http\Controllers\PengumumanController;
use App\Http\Controllers\KelembagaanController;
use App\Http\Controllers\KategoriAspekController;
use App\Http\Controllers\SubkategoriAspekController;
use App\Http\Controllers\AsetDanPermodalanController;
use App\Http\Controllers\HasilRekapitulasiController;
use App\Http\Controllers\UsahaDanUnitUsahaController;
use App\Http\Controllers\KerjasamaDanInovasiController;
use App\Http\Controllers\KeuntunganDanManfaatController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('', function () {
//     return view('percobaan');
// });


Route::get('/', function () {

    // $user = Auth::user();
    //     if ($user->role == 'admin'|| $user->role == 'pegawai') {
    //         $joinedData = DB::table('pengumumans')
    //             ->join('users', 'pengumumans.id_user', '=', 'users.id')
    //             ->select('pengumumans.*', 'users.nama as nama')
    //             ->get();
    //         return view('components.topmenu', ['pengumuman' => $joinedData]);
    //     } else if ($user->role == 'desa') {
    //         $joinedData = DB::table('pengumumans')
    //             ->join('users', 'pengumumans.id_user', '=', 'users.id')
    //             ->select('pengumumans.*', 'users.nama as nama')
    //             ->where('pengumumans.id_user', auth()->user()->id)
    //             ->get();
    //         return view('components.topmenu', ['pengumuman' => $joinedData]);
    //     }
        return view('home.index');
})->name('home');


Route::get('/bumdesa',[BUMDesaController::class, 'index'])->name('bumdesa.index')->middleware('auth');
Route::get('/bumdesa/create',[BUMDesaController::class, 'create'])->name('bumdesa.create')->middleware('auth');
Route::get('/create/{id}',[BUMDesaController::class, 'desa'])->name('bumdesa.desa');
Route::post('/bumdesa/store',[BUMDesaController::class, 'store'])->name('bumdesa.store');
Route::get('/bumdesa/{bumdes}/detail',[BUMDesaController::class, 'detail'])->name('bumdesa.detail')->middleware('auth');
Route::get('/bumdesa/{bumdes}/edit',[BUMDesaController::class, 'edit'])->name('bumdesa.edit')->middleware('auth');
Route::put('/bumdesa/{bumdes}/edit',[BUMDesaController::class, 'update'])->name('bumdesa.update');
Route::delete('/bumdesa/{bumdes}/destroy',[BUMDesaController::class, 'destroy'])->name('bumdesa.destroy')->middleware('auth');
Route::get('/bumdesa/search',[BUMDesaController::class, 'search'])->name('bumdesa.search')->middleware('auth');
Route::get('/bumdesa/ekspor',[BUMDesaController::class, 'ekspor'])->name('bumdesa.ekspor')->middleware('auth');
//Route::get('/edit/{id}',[BUMDesaController::class, 'desa'])->name('bumdesa.desa');

Route::get('/user',[UserController::class, 'index'])->name('user.index')->middleware('auth');
Route::get('/user/login',[UserController::class, 'login'])->name('user.login')->middleware('guest');
Route::post('/login',[UserController::class, 'authenticate']);
Route::post('/logout',[UserController::class, 'logout']);
Route::get('/user',[UserController::class, 'users'])->name('user.index')->middleware('auth');
Route::get('/user/create',[UserController::class, 'create'])->name('user.create')->middleware('auth');
Route::post('/user/store',[UserController::class, 'store'])->name('user.store')->middleware('auth');
Route::put('/user/{id}/edit',[UserController::class, 'update'])->name('user.update')->middleware('auth');;
Route::get('/user/{id}/edit', [UserController::class, 'edit'])->name('user.edit')->middleware('auth');
Route::delete('/user/{user}/destroy',[UserController::class, 'destroy'])->name('user.destroy')->middleware('auth');;

Route::get('/test',function(){
    $max=DB::table('test')->select('point')->get();
    return $max[0]->point;

});

Route::get('/pengumuman', [PengumumanController::class, 'index'])->name('pengumuman.index')->middleware('auth');
Route::get('/pengumuman/create',[PengumumanController::class, 'create'])->name('pengumuman.create')->middleware('auth');
Route::post('/pengumuman/store',[PengumumanController::class, 'store'])->name('pengumuman.store');
Route::get('/pengumuman/{pengumuman}/edit',[PengumumanController::class, 'edit'])->name('pengumuman.edit')->middleware('auth');
Route::put('/pengumuman/{pengumuman}/edit',[PengumumanController::class, 'update'])->name('pengumuman.update');
Route::delete('/pengumuman/{pengumuman}/destroy',[PengumumanController::class, 'destroy'])->name('pengumuman.destroy')->middleware('auth');

Route::resource('/indikator', IndikatorController::class)->middleware('auth');
Route::get('/detail-indikator/{id_bumdesa}/{indikator}/{tahun}', [IndikatorController::class,'detail'])->name('indikator.detail')->middleware('auth');

Route::resource('/rekapitulasi', HasilRekapitulasiController::class)->middleware('auth');
Route::get('/hasil-rekpitulasi/{tahun}', [HasilRekapitulasiController::class, 'tampilan'])->name('rekapitulasi.tampilan')->middleware('auth');
Route::get('/detail-rekapitulasi/{id_bumdesa}/{tahun}', [HasilRekapitulasiController::class,'detailRekapitulasi'])->name('rekapitulasi.detailRekapitulasi')->middleware('auth');

Route::put('/detail-rekapitulasi/{id}', [HasilRekapitulasiController::class,'updateHasil'])->name('rekapitulasi.updateHasil')->middleware('auth');
Route::resource('/hasil-evaluasi', HasilRekapitulasiController::class)->middleware('auth');
Route::get('/cetak-rekpitulasi/{tahun}', [HasilRekapitulasiController::class, 'ekspor'])->name('rekapitulasi.ekspor')->middleware('auth');
