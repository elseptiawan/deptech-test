<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\CutiController;
use App\Http\Controllers\ProfilController;

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

Route::get('/', function () {
    return view('Pages.Login.login');
})->middleware('guest')->name('login');
Route::post('/login', [AdminController::class, "login"]);
Route::get('/logout', [AdminController::class, "logout"])->middleware('auth');
Route::group(['prefix' => '/admin','middleware' => ['auth']], function() {
    Route::get('/', [AdminController::class, "index"]);
    Route::get('/edit/{id}',[AdminController::class, "edit"]);
    Route::post('/update/{id}',[AdminController::class, "update"]);
    Route::get('/create',[AdminController::class, "create"]);
    Route::post('/store',[AdminController::class, "store"]);
    Route::get('/delete/{id}',[AdminController::class, "destroy"]);
});
Route::group(['prefix' => '/pegawai','middleware' => ['auth']], function() {
    Route::get('/', [PegawaiController::class, "index"]);
    Route::get('/edit/{id}',[PegawaiController::class, "edit"]);
    Route::post('/update/{id}',[PegawaiController::class, "update"]);
    Route::get('/create',[PegawaiController::class, "create"]);
    Route::post('/store',[PegawaiController::class, "store"]);
    Route::get('/delete/{id}',[PegawaiController::class, "destroy"]);
});
Route::group(['prefix' => '/cuti','middleware' => ['auth']], function() {
    Route::get('/', [CutiController::class, "index"]);
    Route::get('/edit/{id}',[CutiController::class, "edit"]);
    Route::post('/update/{id}',[CutiController::class, "update"]);
    Route::get('/create',[CutiController::class, "create"]);
    Route::post('/store',[CutiController::class, "store"]);
    Route::get('/delete/{id}',[CutiController::class, "destroy"]);
});
Route::group(['prefix' => '/cutipegawai','middleware' => ['auth']], function() {
    Route::get('/', [PegawaiController::class, "cutipegawai"]);
});
Route::group(['prefix' => '/profil','middleware' => ['auth']], function() {
    Route::get('/', [ProfilController::class, "edit"]);
    Route::post('/update',[ProfilController::class, "update"]);
    Route::post('/updatepassword',[ProfilController::class, "updatepassword"]);
});

