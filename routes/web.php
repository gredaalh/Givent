<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MAsetController;
use App\Http\Controllers\MCabangController;
use App\Http\Controllers\MVendorController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PenghapusanController;
use App\Http\Controllers\PenyerahanCabangController;
use App\Http\Controllers\PenyerahanPegawaiController;

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

route::get('/', [AuthController::class, 'index'])->name('login-show');
Route::post('/', [AuthController::class, 'login'])->name('login');

Route::middleware('auth')->group(function () {
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    });
});

Route::get('/dashboard',[DashboardController::class,'index']);
//MASTER ASET
    Route::get('/maset',[MAsetController::class,'index']);
    Route::get('/tambahmaset',[MAsetController::class,'create']);
    Route::post('/savemaset',[MAsetController::class,'store']);
    Route::get('/deletemaset/{id}', [MAsetController::class, 'destroy']);
    Route::get('/editmaset/{id}', [MAsetController::class, 'edit']);
    Route::post('/updatemaset/{id}', [MAsetController::class, 'update']);

    //MASTER VENDOR
    Route::get('/mvendor',[MVendorController::class,'index']);
    Route::get('/tambahmvendor',[MVendorController::class,'create']);
    Route::post('/savemvendor',[MVendorController::class,'store']);
    Route::get('/deletemvendor/{id}', [MVendorController::class, 'destroy']);
    Route::get('/editmvendor/{id}', [MVendorController::class, 'edit']);
    Route::post('/updatemvendor/{id}', [MVendorController::class, 'update']);

    //MASTER PENGGUNA
    Route::get('/mpengguna',[UserController::class,'index']);
    Route::get('/tambahmpengguna',[UserController::class,'create']);
    Route::post('/savempengguna',[UserController::class,'store']);
    Route::get('/deletempengguna/{id}', [UserController::class, 'destroy']);
    Route::get('/editmpengguna/{id}', [UserController::class, 'edit']);
    Route::post('/updatempengguna/{id}', [UserController::class, 'update']);
    
    //MASTER CABANG
     Route::get('/mcabang',[MCabangController::class,'index']);
     Route::get('/tambahmcabang',[MCabangController::class,'create']);
     Route::post('/savemcabang',[MCabangController::class,'store']);
     Route::get('/deletemcabang/{id}', [MCabangController::class, 'destroy']);
     Route::get('/editmcabang/{id}', [MCabangController::class, 'edit']);
     Route::post('/updatemcabang/{id}', [MCabangController::class, 'update']);

     //PENYERAHAN User
     Route::get('/penyerahanpegawai',[PenyerahanPegawaiController::class,'index']);
     Route::get('/tambahpenyerahanpegawai',[PenyerahanPegawaiController::class,'create']);
     Route::post('/savepenyerahanpegawai',[PenyerahanPegawaiController::class,'store']);
     Route::get('/deletepenyerahanpegawai/{id}', [PenyerahanPegawaiController::class, 'destroy']);
     Route::get('/editpenyerahanpegawai/{id}', [PenyerahanPegawaiController::class, 'edit']);
     Route::post('/updatepenyerahanpegawai/{id}', [PenyerahanPegawaiController::class, 'update']);

      //PENYERAHAN Cabang
      Route::get('/penyerahancabang',[PenyerahanCabangController::class,'index']);
      Route::get('/tambahpenyerahancabang',[PenyerahanCabangController::class,'create']);
      Route::post('/savepenyerahancabang',[PenyerahanCabangController::class,'store']);
      Route::get('/deletepenyerahancabang/{id}', [PenyerahanCabangController::class, 'destroy']);
      Route::get('/editpenyerahancabang/{id}', [PenyerahanCabangController::class, 'edit']);
      Route::post('/updatepenyerahancabang/{id}', [PenyerahanCabangController::class, 'update']);

       //PENGHAPUSAN
       Route::get('/penghapusan',[PenghapusanController::class,'index']);
       Route::get('/tambahpenghapusan',[PenghapusanController::class,'create']);
       Route::post('/savepenghapusan',[PenghapusanController::class,'store']);
       Route::get('/deletepenghapusan/{id}', [PenghapusanController::class, 'destroy']);
       Route::get('/editpenghapusan/{id}', [PenghapusanController::class, 'edit']);
       Route::post('/updatepenghapusan/{id}', [PenghapusanController::class, 'update']);
       

    
    
 


