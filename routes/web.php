<?php

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

Route::get('/', function () {
    return view('auth.login');
});


// Authentication Routes...
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

// Registration Routes...
Route::get('register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

// Password Reset Routes...
Route::get('password/reset', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'showLinkRequestForm']);
Route::post('password/email', [App\Http\Controllers\Auth\ForgotPasswordController::class, 'sendResetLinkEmail']);
Route::get('password/reset/{token}', [App\Http\Controllers\Auth\ResetPasswordController::class, 'showResetForm']);
Route::post('password/reset', [App\Http\Controllers\Auth\ResetPasswordController::class, 'reset']);

Route::get('/siswa', 'SiswaController@index')->name('siswa');
Route::get('/profile/siswa', [App\Http\Controllers\SiswaController::class, 'profile'])->name('siswa.profile');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//profile guru
Route::get('/guru', [App\Http\Controllers\GuruController::class, 'index'])->name('guru');
Route::get('/profile/guru', [App\Http\Controllers\GuruController::class, 'profile'])->name('guru.profile');
Route::get('/profile/guru/edit', [App\Http\Controllers\GuruController::class, 'profile_edit'])->name('profile.edit');
Route::post('/profile/guru/edit/post', [App\Http\Controllers\GuruController::class, 'profilePost'])->name('profile.edit.guru');

//teks eksplanasi & tujuan pembelajaran

Route::get('/eksplanasi', [App\Http\Controllers\EksplanasiController::class, 'index'])->name('teks.eksplanasi');
Route::get('/tujuan', [App\Http\Controllers\EksplanasiController::class, 'indexTujuan'])->name('tujuan.pembelajaran');

//materi
Route::get('/materi', [App\Http\Controllers\MateriController::class, 'index'])->name('materi.index');
Route::get('/materi/siswa', [App\Http\Controllers\SiswaController::class, 'index_materi'])->name('materi_siswa.index');
Route::get('/materi/siswa/lingkungan/{id}', [App\Http\Controllers\SiswaController::class, 'materi_lingkungan'])->name('materi_siswa.lingkungan.index');
Route::get('/materi/siswa/sosial/{id}', [App\Http\Controllers\SiswaController::class, 'materi_sosial'])->name('materi_siswa.sosial.index');
Route::get('/materi/siswa/kesehatan/{id}', [App\Http\Controllers\SiswaController::class, 'materi_kesehatan'])->name('materi_siswa.kesehatan.index');

//jawaban
Route::get('/soal/lingkungan/{id}', [App\Http\Controllers\SiswaController::class, 'soal_lingkungan'])->name('lingkungan.soal');
Route::get('/soal/video/lingkungan/{id}', [App\Http\Controllers\SiswaController::class, 'video_lingkungan'])->name('lingkungan.video');
Route::post('/jawab/lingkungan', [App\Http\Controllers\SiswaController::class, 'jawab_lingkungan'])->name('add.lingkungan');

Route::get('/soal/sosial/{id}', [App\Http\Controllers\SiswaController::class, 'soal_sosial'])->name('sosial.soal');
Route::get('/soal/video/sosial/{id}', [App\Http\Controllers\SiswaController::class, 'video_sosial'])->name('sosial.video');
Route::post('/jawab/sosial', [App\Http\Controllers\SiswaController::class, 'jawab_sosial'])->name('add.sosial');

Route::get('/soal/kesehatan/{id}', [App\Http\Controllers\SiswaController::class, 'soal_kesehatan'])->name('kesehatan.soal');
Route::get('/soal/video/kesehatan/{id}', [App\Http\Controllers\SiswaController::class, 'video_kesehatan'])->name('kesehatan.video');
Route::post('/jawab/kesehatan', [App\Http\Controllers\SiswaController::class, 'jawab_kesehatan'])->name('add.kesehatan');

Route::get('/soal/video/lingkungan/{id}', [App\Http\Controllers\SiswaController::class, 'video_lingkungan'])->name('lingkungan.video');
Route::post('/jawab/lingkungan', [App\Http\Controllers\SiswaController::class, 'jawab_lingkungan'])->name('add.lingkungan');
//lingkungan
Route::get('/materi/lingkungan', [App\Http\Controllers\MateriController::class, 'indexLingkungan'])->name('index.lingkungan');
Route::get('/materi/lingkungan/form', [App\Http\Controllers\MateriController::class, 'lingkungan'])->name('lingkungan');
Route::get('/materi/lingkungan/show/{id}', [App\Http\Controllers\MateriController::class, 'showLingkungan'])->name('detail.lingkungan');
Route::post('/materi/lingkungan/delete', [App\Http\Controllers\MateriController::class, 'destroyLingkungan'])->name('delete.lingkungan');
Route::post('/materi/add', [App\Http\Controllers\MateriController::class, 'addMateri'])->name('materi.add');

Route::get('/materi/kesehatan', [App\Http\Controllers\MateriController::class, 'indexKesehatan'])->name('index.kesehatan');
Route::get('/materi/kesehatan/form', [App\Http\Controllers\MateriController::class, 'kesehatan'])->name('kesehatan');

Route::get('/materi/sosial', [App\Http\Controllers\MateriController::class, 'indexSosial'])->name('index.sosial');
Route::get('/materi/sosial/form', [App\Http\Controllers\MateriController::class, 'sosial'])->name('sosial');


//nilai
Route::get('/nilai/lingkungan', [App\Http\Controllers\NilaiController::class, 'index'])->name('nilai.index');
Route::get('/nilai/kesehatan', [App\Http\Controllers\NilaiController::class, 'index_kesehatan'])->name('nilai.kesehatan.index');
Route::get('/nilai/sosial', [App\Http\Controllers\NilaiController::class, 'index_sosial'])->name('nilai.sosial.index');


//login
Route::get('google', [App\Http\Controllers\GoogleController::class, 'redirect']);
Route::get('google/callback', [App\Http\Controllers\GoogleController::class, 'callback']);
Route::get('/logout', [App\Http\Controllers\HomeController::class, 'logout'])->name('logout');
