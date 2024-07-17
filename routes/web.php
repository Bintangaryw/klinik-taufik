<?php

use App\Models\Dokter;
use App\Models\Jadwal;
use App\Models\Pasien;
use App\Models\Artikel;
use App\Models\Perjanjian;
use App\Models\RekamMedis;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\PasienController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\PerjanjianController;
use App\Http\Controllers\Rekam_MedisController;
use App\Http\Controllers\DokterSessionController;











// Pasien Route
Route::get('/dashboardpasien', function () {
    $jadwals = Jadwal::all();
    $dokters = Dokter::all();
    return view('/pasien/pasiendashboard', ['jadwals' => $jadwals, 'dokter' => $dokters]);
});


Route::get('/pasienprofile/{pasien}', function (Pasien $pasien) {
    return view('/pasien/pasienprofile', ['pasien' => $pasien]);
});
Route::post('/pasienProfile/update/{id}', [PasienController::class, 'updateProfile'])->name('pasienProfile.update');


Route::post('/pasien/tambahperjanjian', [PerjanjianController::class, 'pasienSubmit'])->name('pasien.pasientambahperjanjian');


Route::get('/pasienriwayatperjanjian', function () {
    $pasienId = Auth::guard('pasien')->user()->id;
    $perjanjians = Perjanjian::where('pasien_id', $pasienId)
        ->filter(request(['searchNomorRm', 'searchNama', 'searchNomorTelepon', 'searchTanggal', 'searchStatus']))
        ->latest()
        ->get();
    return view('/pasien/pasienriwayatperjanjian', ['perjanjian' => $perjanjians]);
});
Route::post('/pasienPerjanjian/batalkan/{id}', [PerjanjianController::class, 'pasienBatalkan'])->name('pasienPerjanjian.batal');


Route::get('/pasienrm/{pasien}', function (Pasien $pasien) {
    $filters = request()->only(['searchTanggal']);
    $rekamMedis = $pasien->rekam_medis()->filter($filters)->get();

    return view('pasien.pasienrm', [
        'title' => 'Rekam Medis Pasien: ' . $pasien->nama_pasien,
        'rekam_medis' => $rekamMedis,
        'pasien' => $pasien
    ]);
});
Route::get('/pasienrmdetail/{pasien}/{rekam_medis}', function (Pasien $pasien, RekamMedis $rekam_medis) {
    return view('/pasien/pasienrmdetail', ['rm' => $rekam_medis, 'pasien' => $pasien]);
});


Route::get('/pasienprofile', function () {
    return view('/pasien/pasienprofile');
});


Route::get('/pasieneditpassword/{pasien}', function (Pasien $pasien) {
    return view('/pasien/pasieneditpassword', ['pasien' => $pasien]);
});
Route::post('/pasien/updatePassword/{id}', [PasienController::class, 'updatePassword'])->name('pasien.updatePassword');


Route::get('/pasienartikel', function () {
    return view('/pasien/pasienartikel', ['artikels' => Artikel::all()]);
});
Route::get('/pasienartikel/{artikel:id}', function (Artikel $artikel) {
    return view('/pasien/pasienartikelbaca', ['artikel' => $artikel]);
});


Route::get('/', [SessionController::class, 'index'])->name('pasienlogin.index');
Route::post('/pasienlogin', [SessionController::class, 'login'])->name('pasien.login');
Route::post('/pasien/logout', [SessionController::class, 'logout'])->name('pasien.logout');


Route::get('/pasienregister', function () {
    return view('/pasien/pasienregister');
});
Route::post('/pasien/register', [PasienController::class, 'register'])->name('pasien.register');










// Dokter Route
Route::get('/dokterlogin', [DokterSessionController::class, 'index']);
Route::post('/dokterlogin/login', [DokterSessionController::class, 'login'])->name('dokter.login');
Route::post('/dokterlogout', [DokterSessionController::class, 'logout'])->name('dokter.logout');


Route::get('/dokterdashboard', function () {
    return view('/dokter/dokterdashboard');
});


Route::get('/dokterprofile/{dokter}', function (Dokter $dokter) {
    return view('/dokter/dokterprofile', ['dokter' => $dokter]);
});
Route::post('/dokterProfile/update/{id}', [DokterController::class, 'updateProfile'])->name('dokterProfile.update');

Route::get('/doktereditpassword/{dokter}', function (Dokter $dokter) {
    return view('/dokter/doktereditpassword', ['dokter' => $dokter]);
});
Route::post('/dokter/updatePassword/{id}', [DokterController::class, 'updatePassword'])->name('dokter.updatePassword');


Route::get('/jadwal/edit/{id}', [JadwalController::class, 'edit'])->name('jadwal.edit');
Route::post('/jadwal/update/{id}', [JadwalController::class, 'update'])->name('jadwal.update');


Route::get('/dokterjadwalsaya', function () {
    $dokterId = Auth::guard('dokter')->user()->id;
    $jadwals = Jadwal::where('dokter_id', $dokterId)
        ->filter(request(['searchTanggal', 'searchJamMulai', 'searchJamSelesai', 'searchStatusAktif']))
        ->latest()
        ->get();
    return view('/dokter/dokterjadwalsaya', ['jadwal' => $jadwals]);
});


Route::get('/dokterrm', function () {
    return view('/dokter/dokterrm', ['title' => 'Rekam Medis', 'pasiens' => Pasien::filter(request(['searchNomorRm', 'searchNama', 'searchNomorTelepon']))->latest()->get()]);
});
Route::get('/dokterrmdetail/{pasien}', function (Pasien $pasien) {
    $filters = request()->only(['searchTanggal']);
    $rekamMedis = $pasien->rekam_medis()->filter($filters)->get();

    return view('dokter.dokterrmdetail', [
        'title' => 'Rekam Medis Pasien: ' . $pasien->nama_pasien,
        'rekam_medis' => $rekamMedis,
        'pasien' => $pasien
    ]);
});
Route::get('/doktereditrm/{pasien}/{rekam_medis}', function (Pasien $pasien, RekamMedis $rekam_medis) {
    return view('/dokter/doktereditrm', ['rm' => $rekam_medis, 'pasien' => $pasien]);
});
Route::post('/rm/updateByDokter/{id}', [Rekam_MedisController::class, 'updateRekamMedisByDokter'])->name('rekam_medis.editByDokter');
Route::get('/dokterinputrm/{pasien}', function (Pasien $pasien) {
    return view('/dokter/dokterinputrm', ['pasien' => $pasien]);
});
Route::post('rekam_medis/submitByDokter', [Rekam_MedisController::class, 'submitByDokter'])->name('rekam_medis.submitByDokter');


Route::get('/dokterlp', function () {
    $dokterId = Auth::guard('dokter')->user()->id;
    $perjanjians = Perjanjian::where('dokter_id', $dokterId)
        ->filter(request(['searchNomorRm', 'searchNama', 'searchNomorTelepon', 'searchTanggal', 'searchStatus']))
        ->latest()
        ->get();
    return view('dokter.dokterlistperjanjian', ['perjanjians' => $perjanjians]);
});
Route::post('/dokter/perjanjianSelesai/{id}', [PerjanjianController::class, 'dokterSelesai'])->name('dokter.perjanjianSelesai');
Route::post('/dokter/perjanjianBatalkan/{id}', [PerjanjianController::class, 'dokterBatalkan'])->name('dokter.perjanjianBatalkan');













// Admin Route
Route::get('/admin-klinik-loginform', [AdminController::class, 'index']);
Route::post('/adminlogin/login', [AdminController::class, 'login'])->name('admin.login');
Route::post('/logout', [AdminController::class, 'logout'])->name('admin.logout');


Route::get('/admindashboard', function () {
    return view('/admin/admindashboard',);
});

Route::post('/dokter/tambahjadwal', [JadwalController::class, 'submit'])->name('dokter.tambahjadwal');


Route::get('/adminlistdokter', function () {
    return view('/admin/adminlistdokter', ['dokters' => Dokter::filter(request(['searchNama', 'searchNomorTelepon']))->latest()->get()]);
});
Route::get('/admintambahdokter', function () {
    return view('/admin/admintambahdokter');
});
Route::get('/admintambahdokter', function () {
    return view('/admin/admintambahdokter');
});
Route::post('/dokter/submit', [DokterController::class, 'submit'])->name('dokter.submit');


Route::get('/adminlistpasien', function () {
    return view('/admin/adminlistpasien', ['pasiens' => Pasien::filter(request(['searchNomorRm', 'searchNama', 'searchNomorTelepon']))->latest()->get()]);
});
Route::get('/adminregisterpasien', function () {
    return view('/admin/adminregisterpasien');
});
Route::post('/admin/registerpasien', [PasienController::class, 'registerByAdmin'])->name('admin.registerpasien');



Route::get('/admindetaildokter/{dokter}', function (Dokter $dokter) {
    return view('/admin/admindetaildokter', ['dokter' => $dokter]);
});


Route::get('/admindetailpasien/{pasien}', function (Pasien $pasien) {
    return view('/admin/admindetailpasien', ['pasien' => $pasien]);
});
Route::get('/admineditpasien/{pasien}', function (Pasien $pasien) {
    return view('/admin/admineditpasien', ['pasien' => $pasien]);
});
Route::post('admin/editpasien/{id}', [PasienController::class, 'updateProfileByAdmin'])->name('admin.editprofilepasien');


Route::get('/adminrm', function () {
    return view('/admin/adminrm', ['pasiens' => Pasien::filter(request(['searchNomorRm', 'searchNama', 'searchNomorTelepon']))->latest()->get()]);
});
Route::get('/adminrmdetail/{pasien}', function (Pasien $pasien) {
    return view('/admin/adminrmdetail', ['title' => 'Rekam Medis Pasien: ' . $pasien->nama_pasien, 'rekam_medis' => $pasien->rekam_medis, 'pasien' => $pasien]);
});
Route::get('/adminrmdetail/{pasien}', function (Pasien $pasien) {
    $filters = request()->only(['searchTanggal']);
    $rekamMedis = $pasien->rekam_medis()->filter($filters)->get();

    return view('admin.adminrmdetail', [
        'title' => 'Rekam Medis Pasien: ' . $pasien->nama_pasien,
        'rekam_medis' => $rekamMedis,
        'pasien' => $pasien
    ]);
});
Route::get('/admineditrm/{pasien}/{rekam_medis}', function (Pasien $pasien, RekamMedis $rekam_medis) {
    return view('/admin/admineditrm', ['rm' => $rekam_medis, 'pasien' => $pasien]);
});
Route::post('/rm/update/{id}', [Rekam_medisController::class, 'updateRekamMedis'])->name('rekam_medis.edit');
Route::get('/admininputrm/{pasien}', function (Pasien $pasien) {
    return view('/admin/admininputrm', ['pasien' => $pasien]);
});
Route::post('rekam_medis/submit', [Rekam_MedisController::class, 'submit'])->name('rekam_medis.submit');


Route::get('/adminperjanjian', function () {
    return view('/admin/adminperjanjian', ['perjanjians' => Perjanjian::filter(request(['searchNomorRm', 'searchNama', 'searchNomorTelepon', 'searchTanggal', 'searchStatus']))->oldest()->get()]);
});
Route::get('/admintambahperjanjian/{pasien}', function (Pasien $pasien) {
    $jadwals = Jadwal::all();
    $dokters = Dokter::all();
    return view('/admin/admintambahperjanjian', ['pasien' => $pasien, 'jadwals' => $jadwals, 'dokter' => $dokters]);
});
Route::post('/perjanjian/submit', [PerjanjianController::class, 'submit'])->name('perjanjian.submit');
Route::post('/perjanjian/selesai/{id}', [PerjanjianController::class, 'selesai'])->name('perjanjian.selesai');
Route::post('/perjanjian/batalkan/{id}', [PerjanjianController::class, 'batalkan'])->name('perjanjian.batal');


Route::get('/adminartikel', function () {
    return view('/admin/adminartikel', ['artikels' => Artikel::all()]);
})->name('adminartikel');
Route::get('/adminartikel/{artikel:id}', function (Artikel $artikel) {
    return view('/admin/adminartikeldetail', ['artikels' => $artikel]);
});
Route::get('/admintambahartikel', function () {
    return view('/admin/admintambahartikel',);
});
Route::post('/artikel/submit', [ArtikelController::class, 'submit'])->name('artikel.submit');
Route::get('/artikel/edit/{id}', [ArtikelController::class, 'edit'])->name('artikel.edit');
Route::post('/artikel/update/{id}', [ArtikelController::class, 'update'])->name('artikel.update');
Route::post('/artikel/delete/{id}', [ArtikelController::class, 'delete'])->name('artikel.delete');
