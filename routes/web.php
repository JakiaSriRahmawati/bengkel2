<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\MekanikController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Auth;
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
// user
// Route::group(['middleware'=> 'auth'], function(){
//     Route::middleware(['role:Pengguna'])->group(function(){});
// });

// User
Route::get("/", "UserController@home")->name("home");
Route::middleware('auth')->get("/homePengguna", "UserController@homePengguna")->name("homePengguna");
Route::post("/postPesan", "UserController@postPesan")->name("postPesan");
Route::get("/login", "AdminController@login")->name("login");
Route::get("/logout", "UserController@logout")->name("logout");

// Admin
Route::middleware('auth')->get("/homeAdmin", "AdminController@homeAdmin")->name("homeAdmin");
Route::get("/kelolaPengguna", "AdminController@kelolaPengguna")->name("kelolaPengguna");
Route::get("/kelolaMekanik", "AdminController@kelolaMekanik")->name("kelolaMekanik");
Route::get("/kelolaPesanan", "AdminController@kelolaPesanan")->name("kelolaPesanan");
Route::get("/kelolaOwner", "AdminController@kelolaOwner")->name("kelolaOwner");
Route::get("/detailBooking", "AdminController@detailBooking")->name("detailBooking");

// profil
Route::get("/profil/{id}", "UserController@profil")->name("profil");

// autentifikasi
Route::middleware('auth')->get("/homeMekanik/{id}", "MekanikController@homeMekanik")->name("homeMekanik");
Route::middleware('auth')->get("/homeOwner", "AdminController@homeOwner")->name("homeOwner");
Route::middleware('auth')->get("/homeKasir/{id}", "KasirController@homeKasir")->name("homeKasir");
Route::post("/postLogin", "AdminController@postLogin")->name("postLogin");

// User Crud
Route::post("/postVerify/{id}", "BookingController@postVerify")->name("postVerify");
Route::post("/postTambahMekanik", "AdminController@postTambahMekanik")->name("postTambahMekanik");
Route::get("/editMekanik/{User}", "AdminController@editMekanik")->name("editMekanik");
Route::post('/postEditUser/{d}', 'AdminController@postEditUser')->name('postEditUser');
Route::get('/editPengguna/{id}', 'AdminController@editPengguna')->name('editPengguna');
Route::get('/tambahpengguna','AdminController@tambahpengguna')->name('tambahpengguna');
Route::post('/postTambahUser','UserController@postTambahUser')->name('postTambahUser');
// Route::post('/postEditUser/{id}','UserController@postEditUser')->name('postEditUser');
Route::post('/hapusUser/{id}',[AdminController::class,'hapusUser'])->name('hapusUser');

//mekanik
Route::get('/order/{pesan}',[MekanikController::class,'order'])->name('order');
Route::get('/barang',[MekanikController::class,'barang'])->name('barang');
Route::get('/MekanikDT',[TransaksiController::class,'MekanikDT'])->name('MekanikDT');
Route::get('/DT/{id}',[TransaksiController::class,'DT'])->name('DT');
Route::post('/editorder/{pesan}',[MekanikController::class,'editorder'])->name('editorder');
Route::post('/tambahDT',[TransaksiController::class,'tambahDT'])->name('tambahDT');

// kasir
Route::get("/kelolaKasir","AdminController@kelolaKasir")->name("kelolaKasir");
Route::get("/bukti/{id}","TransaksiController@bukti")->name("bukti");
Route::post("/bayar","TransaksiController@bayar")->name("bayar");
Route::get('/confirm/{pesan}',[KasirController::class,'confirm'])->name('confirm');
Route::post('/editconfirm/{pesan}',[KasirController::class,'editconfirm'])->name('editconfirm');
// Route::post('/postBayar', [TransaksiController::class,'postBayar'])->name('postBayar');
// Route::get('/`homeKasir`',[KasirController::class,'homeKasir'])->name('homeKasir');
