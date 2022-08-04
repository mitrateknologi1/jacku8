<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\dashboard\berita\BeritaController;
use App\Http\Controllers\dashboard\berita\KategoriBeritaController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\divisiJurnal\ArsipJurnalController;
use App\Http\Controllers\dashboard\divisiKurikulum\ArsipKurikulumController;
use App\Http\Controllers\dashboard\divisiKurikulum\BahanAjarController;
use App\Http\Controllers\dashboard\divisiKurikulum\KurikulumController;
use App\Http\Controllers\dashboard\divisiKurikulum\ModulController;
use App\Http\Controllers\dashboard\divisiKurikulum\MonitoringController;
use App\Http\Controllers\dashboard\divisiKurikulum\RpsController;
use App\Http\Controllers\dashboard\divisiPenelitian\ArsipPenelitianController;
use App\Http\Controllers\dashboard\divisiPenelitian\PenelitianController;
use App\Http\Controllers\dashboard\divisiPenelitian\PengabdianController;
use App\Http\Controllers\dashboard\manajemenWeb\KontakController;
use App\Http\Controllers\dashboard\manajemenWeb\SejarahController;
use App\Http\Controllers\dashboard\manajemenWeb\StrukturOrganisasiController;
use App\Http\Controllers\dashboard\manajemenWeb\TampilanBerandaController;
use App\Http\Controllers\dashboard\manajemenWeb\TupoksiController;
use App\Http\Controllers\dashboard\manajemenWeb\VisiMisiController;
use App\Http\Controllers\dashboard\masterData\AkunController;
use App\Http\Controllers\dashboard\masterData\GolonganController;
use App\Http\Controllers\dashboard\masterData\JabatanFungsionalController;
use App\Http\Controllers\dashboard\masterData\ProdiController;
use App\Http\Controllers\dashboard\masterData\SkemaPenelitianController;
use App\Http\Controllers\dashboard\masterData\SkemaPengabdianController;
use App\Http\Controllers\dashboard\masterData\SumberDanaController;
use App\Http\Controllers\dashboard\ProfilController;
use App\Http\Controllers\ImportController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\ListController;
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

Route::get('/', [LandingController::class, 'index']);
Route::get('/sejarah', [LandingController::class, 'sejarah']);
Route::get('/visi-misi', [LandingController::class, 'visiMisi']);
Route::get('/tupoksi', [LandingController::class, 'tupoksi']);
Route::get('/profil-kami', [LandingController::class, 'profilKami']);
Route::get('/struktur-organisasi', [LandingController::class, 'strukturOrganisasi']);


Route::get('/daftar-berita', [LandingController::class, 'daftarBerita']);
Route::get('/detail-berita/{berita}', [LandingController::class, 'detailBerita']);



Route::get('/dokumen/divisi-jurnal/arsip', [LandingController::class, 'jurnalArsip']);
Route::get('/dokumen/divisi-penelitian/arsip', [LandingController::class, 'penelitianArsip']);
Route::get('/dokumen/divisi-penelitian/pengabdian', [LandingController::class, 'penelitianPengabdian']);
Route::get('/dokumen/divisi-penelitian/penelitian', [LandingController::class, 'penelitianPenelitian']);

Route::get('/dokumen/divisi-kurikulum/arsip', [LandingController::class, 'kurikulumArsip']);
Route::get('/dokumen/divisi-kurikulum/kurikulum', [LandingController::class, 'kurikulumKurikulum']);
Route::get('/dokumen/divisi-kurikulum/modul', [LandingController::class, 'kurikulumModul']);
Route::get('/dokumen/divisi-kurikulum/bahan-ajar', [LandingController::class, 'kurikulumBahanAjar']);
Route::get('/dokumen/divisi-kurikulum/rps', [LandingController::class, 'kurikulumRps']);

Route::get('/login', [AuthController::class, 'index'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::get('/logout', [AuthController::class, 'logout']);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::resource('/profil', ProfilController::class)->parameters([
        'profil' => 'user'
    ]);

    Route::group(['middleware' => ['role:admin']], function () {
        // Master Data
        Route::resource('master-data/golongan', GolonganController::class);
        Route::resource('master-data/jabatan-fungsional', JabatanFungsionalController::class)->parameters([
            'jabatan-fungsional' => 'jabatanFungsional'
        ]);
        Route::resource('master-data/prodi', ProdiController::class);
        Route::resource('master-data/skema-penelitian', SkemaPenelitianController::class)->parameters([
            'skema-penelitian' => 'skemaPenelitian'
        ]);
        Route::resource('master-data/skema-pengabdian', SkemaPengabdianController::class)->parameters([
            'skema-pengabdian' => 'skemaPengabdian'
        ]);
        Route::resource('master-data/sumber-dana', SumberDanaController::class)->parameters([
            'sumber-dana' => 'sumberDana'
        ]);
        Route::resource('master-data/akun', AkunController::class)->parameters([
            'akun' => 'user'
        ]);
    });

    Route::group(['middleware' => ['role:admin|kurikulum|dosen']], function () {
        // Divisi Kurikulum
        Route::resource('divisi-kurikulum/kurikulum', KurikulumController::class);
        Route::resource('divisi-kurikulum/modul', ModulController::class);
        Route::resource('divisi-kurikulum/bahan-ajar', BahanAjarController::class)->parameters([
            'bahan-ajar' => 'bahanAjar'
        ]);
        Route::resource('divisi-kurikulum/rps', RpsController::class)->parameters([
            'rps' => 'rps'
        ]);
        Route::resource('divisi-kurikulum/monitoring', MonitoringController::class);
        Route::resource('divisi-kurikulum/arsip', ArsipKurikulumController::class)->parameters([
            'arsip' => 'arsipKurikulum'
        ]);
    });

    Route::group(['middleware' => ['role:admin|kerja_sama|dosen']], function () {
        // Divisi Jurnal
        Route::resource('divisi-jurnal/arsip', ArsipJurnalController::class)->parameters([
            'arsip' => 'arsipJurnal'
        ]);
    });

    Route::group(['middleware' => ['role:admin|penelitian|dosen']], function () {
        // Divisi Penelitian
        Route::resource('divisi-penelitian/arsip', ArsipPenelitianController::class)->parameters([
            'arsip' => 'arsipPenelitian'
        ]);
        Route::resource('divisi-penelitian/penelitian', PenelitianController::class);
        Route::resource('divisi-penelitian/pengabdian', PengabdianController::class);
    });

    // List
    Route::post('/list/prodi', [ListController::class, 'prodi']);
    Route::post('/list/skema-penelitian', [ListController::class, 'skemaPenelitian']);
    Route::post('/list/skema-pengabdian', [ListController::class, 'skemaPengabdian']);
    Route::post('/list/sumber-dana', [ListController::class, 'sumberDana']);

    Route::group(['middleware' => ['role:admin|kurikulum|penelitian|kerja_sama']], function () {
        // Berita
        Route::resource('/berita/berita', BeritaController::class)->parameters([
            'berita' => 'berita'
        ]);
        Route::resource('/berita/kategori', KategoriBeritaController::class)->parameters([
            'kategori' => 'kategoriBerita'
        ]);
    });

    Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
        \UniSharp\LaravelFilemanager\Lfm::routes();
    });

    Route::group(['middleware' => ['role:admin']], function () {
        Route::resource('/manajemen-web/kontak', KontakController::class);
        Route::resource('/manajemen-web/sejarah', SejarahController::class);
        Route::resource('/manajemen-web/tupoksi', TupoksiController::class);
        Route::resource('/manajemen-web/visi-misi', VisiMisiController::class)->parameters([
            'visi-misi' => 'visiMisi'
        ]);
        Route::resource('/manajemen-web/struktur-organisasi', StrukturOrganisasiController::class)->parameters([
            'struktur-organisasi' => 'strukturOrganisasi'
        ]);
        Route::resource('/manajemen-web/tampilan-beranda', TampilanBerandaController::class)->parameters([
            'tampilan-beranda' => 'tampilanBeranda'
        ]);
    });
});

// Route::get('import/bahanAjar', [ImportController::class, 'bahanAjar']);
// Route::get('import/kurikulum', [ImportController::class, 'kurikulum']);
// Route::get('import/modul', [ImportController::class, 'modul']);
// Route::get('import/penelitian', [ImportController::class, 'penelitian']);
// Route::get('import/pengabdian', [ImportController::class, 'pengabdian']);
// Route::get('import/rps', [ImportController::class, 'rps']);
