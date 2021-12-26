<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\SemproController;
use App\Http\Controllers\KaprodiController;
use App\Http\Controllers\LogbookController;
use App\Http\Controllers\SkripsiController;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\SuratTugasController;
use App\Http\Controllers\MhsBimbinganController;

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

/*Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('login', [AuthController::class, 'login'])->name('login.custom');
// Route::get('register', [AuthController::class, 'register']);
// Route::post('register', [AuthController::class, 'store'])->name('Auth.store');
Route::get('logout', [AuthController::class, 'logout']);

// Halaman Home (Mahasiswa, Admin, Kaprodi, Dosen)
// ( Mahasiswa )
Route::middleware(['auth'])->group(function () {
    Route::get('/ubah-password', [UserController::class, 'ubah']);
    Route::post('/ubah-password', [UserController::class, 'update'])->name('User.update');
    Route::middleware(['cek.Mahasiswa'])->group(function () {
        Route::get('/', [HomeController::class, 'index']);
        Route::get('/pemberitahuan', [HomeController::class, 'notif']);
        Route::get('/logbook', [LogbookController::class, 'index']);
        Route::get('/cetak-logbook', [LogbookController::class, 'cetak']);
        Route::get('/logbook/add-logbook', [LogbookController::class, 'addlogbook']);
        Route::post('logbook/add-logbook', [LogbookController::class, 'store'])->name('Logbook.store');
        Route::get('/logbook/add-logbook/{id}/hapus', [LogbookController::class, 'destroy'])->name('Logbook.destroy');
        // Bagian Approval Dosen (Mahasiswa)
        Route::get('/dosen-pembimbing', [MhsBimbinganController::class, 'dosenPembimbing']);
        Route::post('dosen-pembimbing', [MhsBimbinganController::class, 'store'])->name('MhsBimbingan.store');
        Route::get('/dosen-sempro', [MhsBimbinganController::class, 'dosenSempro']);
        Route::post('/dosen-sempro/{id}', [MhsBimbinganController::class, 'updateSempro'])->name('MhsBimbingan.updateSempro');
        Route::get('/dosen-revisi-sempro', [MhsBimbinganController::class, 'dosenRevisiSempro']);
        Route::post('/dosen-revisi-sempro/{id}', [MhsBimbinganController::class, 'updateRvsSempro'])->name('MhsBimbingan.updateRvsSempro');
        Route::get('/dosen-skripsi', [MhsBimbinganController::class, 'dosenSkripsi']);
        Route::post('/dosen-skripsi/{id}', [MhsBimbinganController::class, 'updateSkripsi'])->name('MhsBimbingan.updateSkripsi');
        Route::get('/dosen-revisi-skripsi', [MhsBimbinganController::class, 'dosenRevisiSkripsi']);
        Route::post('/dosen-revisi-skripsi/{id}', [MhsBimbinganController::class, 'updateRvsSkripsi'])->name('MhsBimbingan.updateRvsSkripsi');
       // Bagian Administrasi (Mahasiswa)
        Route::get('/surat-tugas', [SuratTugasController::class, 'index']);
        Route::post('surat-tugas', [SuratTugasController::class, 'store'])->name('SuratTugas.store');
        Route::get('/surat-tugas/perpanjangan', [SuratTugasController::class, 'perpanjangan']);
        Route::post('/surat-tugas/perpanjangan', [SuratTugasController::class, 'storePerpanjang'])->name('SuratTugas.storePerpanjang');
        Route::get('/sempro', [SemproController::class, 'index']);
        Route::post('sempro', [SemproController::class, 'store'])->name('Sempro.store');
        Route::get('/sempro/hasil-sempro', [SemproController::class, 'hslsempro']);
        Route::post('/sempro/hasil-sempro', [SemproController::class, 'storeRevisi'])->name('Sempro.storeRevisi');
        Route::get('/skripsi', [SkripsiController::class, 'index']);
        Route::post('skripsi', [SkripsiController::class, 'store'])->name('Skripsi.store');
        Route::get('/skripsi/hasil-skripsi', [SkripsiController::class, 'hslskripsi']);
        Route::post('/skripsi/hasil-skripsi', [SkripsiController::class, 'storeRevisi'])->name('Skripsi.storeRevisi');
    });
    Route::middleware(['cek.Kaprodi'])->group(function () {
        Route::get('/kaprodi', [KaprodiController::class, 'index']);
        Route::get('/kaprodi-data-mhs', [KaprodiController::class, 'dataMhs']);
        Route::get('/kaprodi-data-dosen', [KaprodiController::class, 'dataDosen']);
        // Bagian Administrasi (Kaprodi)
        Route::get('/kaprodi-srt', [KaprodiController::class, 'kaprodiSrt']);
        Route::post('/kaprodi-srt/{id}', [SuratTugasController::class, 'updateKaprodi'])->name('SuratTugas.updateKaprodi');
        Route::get('/kaprodi-srt/{id}/cancel', [SuratTugasController::class, 'cancelKaprodi'])->name('SuratTugas.cancelKaprodi');
        Route::get('/kaprodi-srt-perpanjangan', [KaprodiController::class, 'kaprodiSrtPerpanjang']);
        Route::post('/kaprodi-srt-perpanjangan/{id}', [SuratTugasController::class, 'updateKaprodiPerpanjang'])->name('SuratTugas.updateKaprodiPerpanjang');
        Route::get('/kaprodi-srt-perpanjangan/{id}/cancel', [SuratTugasController::class, 'cancelKaprodiPerpanjang'])->name('SuratTugas.cancelKaprodiPerpanjang');
        Route::get('/kaprodi-sempro', [KaprodiController::class, 'kaprodiSempro']);
        Route::post('/kaprodi-sempro/{id}', [SemproController::class, 'updateKaprodi'])->name('Sempro.updateKaprodi');
        Route::get('/kaprodi-sempro/{id}/cancel', [SemproController::class, 'cancelKaprodi'])->name('Sempro.cancelKaprodi');
        Route::get('/kaprodi-srttugas-skripsi', [KaprodiController::class, 'kaprodiRevisiSempro']);
        Route::post('/kaprodi-srttugas-skripsi/{id}', [SemproController::class, 'updateKaprodiRevisi'])->name('Sempro.updateKaprodiRevisi');
        Route::get('/kaprodi-srttugas-skripsi/{id}/cancel', [SemproController::class, 'cancelKaprodiRevisi'])->name('Sempro.cancelKaprodiRevisi');
        Route::get('/kaprodi-skripsi', [KaprodiController::class, 'kaprodiSkripsi']);
        Route::post('/kaprodi-skripsi/{id}', [SkripsiController::class, 'updateKaprodi'])->name('Skripsi.updateKaprodi');
        Route::get('/kaprodi-skripsi/{id}/cancel', [SkripsiController::class, 'cancelKaprodi'])->name('Skripsi.cancelKaprodi');
        Route::get('/kaprodi-hasil-skripsi', [KaprodiController::class, 'kaprodiRevisiSkripsi']);
        Route::post('/kaprodi-hasil-skripsi/{id}', [SkripsiController::class, 'updateKaprodiRevisi'])->name('Skripsi.updateKaprodiRevisi');
        Route::get('/kaprodi-hasil-skripsi/{id}/cancel', [SkripsiController::class, 'cancelKaprodiRevisi'])->name('Skripsi.cancelKaprodiRevisi');
    });
    Route::middleware(['cek.Dosen'])->group(function () {
        Route::get('/dashboard-dosen', [DosenController::class, 'index']);
        Route::get('/mhs-bimbingan', [DosenController::class, 'mhsBimbingan']);
        // Bagian Approval Dosen (Dosen)
        Route::get('/pengajuan-mhs', [DosenController::class, 'pengajuanMahasiswa']);
        Route::post('/pengajuan-mhs/{id}', [MhsBimbinganController::class, 'update'])->name('MhsBimbingan.update');
        Route::get('/pengajuan-mhs/{id}/cancel', [MhsBimbinganController::class, 'cancelSurat'])->name('MhsBimbingan.cancelSurat');
        Route::get('/pengajuan-sempro', [DosenController::class, 'semproDosen']);
        Route::post('/pengajuan-sempro/{id}', [MhsBimbinganController::class, 'updateDosenSempro'])->name('MhsBimbingan.updateDosenSempro');
        Route::get('/pengajuan-sempro/{id}/cancel', [MhsBimbinganController::class, 'cancelSempro'])->name('MhsBimbingan.cancelSempro');
        Route::get('/pengajuan-rvs-sempro', [DosenController::class, 'revisiSempro']);
        Route::post('/pengajuan-rvs-sempro/{id}', [MhsBimbinganController::class, 'updateDosenRvsSempro'])->name('MhsBimbingan.updateDosenRvsSempro');
        Route::get('/pengajuan-rvs-sempro/{id}/cancel', [MhsBimbinganController::class, 'cancelRvsSempro'])->name('MhsBimbingan.cancelRvsSempro');
        Route::get('/pengajuan-skripsi', [DosenController::class, 'skripsiDosen']);
        Route::post('/pengajuan-skripsi/{id}', [MhsBimbinganController::class, 'updateDosenSkripsi'])->name('MhsBimbingan.updateDosenSkripsi');
        Route::get('/pengajuan-skripsi/{id}/cancel', [MhsBimbinganController::class, 'cancelSkripsi'])->name('MhsBimbingan.cancelSkripsi');
        Route::get('/pengajuan-rvs-skripsi', [DosenController::class, 'revisiSkripsi']);
        Route::post('/pengajuan-rvs-skripsi/{id}', [MhsBimbinganController::class, 'updateDosenRvsSkripsi'])->name('MhsBimbingan.updateDosenRvsSkripsi');
        Route::get('/pengajuan-rvs-skripsi/{id}/cancel', [MhsBimbinganController::class, 'cancelRvsSkripsi'])->name('MhsBimbingan.cancelRvsSkripsi');
    });
    Route::middleware(['cek.Admin'])->group(function () {
        Route::get('/admin', [HomeController::class, 'dshadm']);
        // Route::get('/data-skripsi', [SkripsiController::class, 'dtskripsi']);
        Route::get('/dosen', [DosenController::class, 'dataDosen']);
        Route::post('/dosen', [DosenController::class, 'store'])->name('Dosen.store');
        // Route::get('/dosen/{id}/hapus', [DosenController::class, 'destroy'])->name('Dosen.destroy');
        Route::get('/mahasiswa', [MahasiswaController::class, 'dataMahasiswa']);
        Route::post('/mahasiswa', [MahasiswaController::class, 'store'])->name('Mahasiswa.store');
        Route::get('/user', [UserController::class,'index']);
        Route::post('/user', [UserController::class,'store'])->name('User.store');
        Route::get('/admin-laporan', [UserController::class,'laporan']);
        // Route::resource('mahasiswa', MahasiswaController::class);
        // Bagian Administrasi (Admin)
        Route::get('/admin-srt', [SuratTugasController::class, 'admsrt']);
        Route::post('/admin-srt/{id}', [SuratTugasController::class, 'update'])->name('SuratTugas.update');
        Route::get('/admin-srt/{id}/cancel', [SuratTugasController::class, 'cancelSurat'])->name('SuratTugas.cancelSurat');
        Route::get('/admin-srt-perpanjangan', [SuratTugasController::class, 'admperpanjangan']);
        Route::post('/admin-srt-perpanjangan/{id}', [SuratTugasController::class, 'updatePerpanjang'])->name('SuratTugas.updatePerpanjang');
        Route::get('/admin-srt-perpanjangan/{id}/cancel', [SuratTugasController::class, 'cancelPerpanjang'])->name('SuratTugas.cancelPerpanjang');
        Route::get('/admin-sempro', [SemproController::class, 'admsempro']);
        Route::post('/admin-sempro/{id}', [SemproController::class, 'update'])->name('Sempro.update');
        Route::get('/admin-sempro/{id}/cancel', [SemproController::class, 'cancelSurat'])->name('Sempro.cancelSurat');
        Route::get('/admin-srttugas-skripsi', [SemproController::class, 'admhslsempro']);
        Route::post('/admin-srttugas-skripsi/{id}', [SemproController::class, 'updateRevisi'])->name('Sempro.updateRevisi');
        Route::get('/admin-srttugas-skripsi/{id}/cancel', [SemproController::class, 'cancelRevisi'])->name('Sempro.cancelRevisi');
        Route::get('/admin-skripsi', [SkripsiController::class, 'admskripsi']);
        Route::post('/admin-skripsi/{id}', [SkripsiController::class, 'update'])->name('Skripsi.update');
        Route::get('/admin-skripsi/{id}/cancel', [SkripsiController::class, 'cancelSurat'])->name('Skripsi.cancelSurat');
        Route::get('/admin-hasil-skripsi', [SkripsiController::class, 'admhslskripsi']);
        Route::get('/admin-hasil-skripsi/{id}', [SkripsiController::class, 'updateRevisi'])->name('Skripsi.updateRevisi');
        Route::get('/admin-hasil-skripsi/{id}/cancel', [SkripsiController::class, 'cancelRevisi'])->name('Skripsi.cancelRevisi');
    });
});
