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


Route::get('/login', function () {
    return view('user.login');
})->name('login');

Route::post('/postlogin','App\Http\Controllers\LoginController@postlogin')->name('postlogin');
Route::get('/logout','App\Http\Controllers\LoginController@logout')->name('logout');

Route::get('/', function () {
    return view('index');
});

Route::get('/register', [App\Http\Controllers\LoginController::class, 'register'])->name('register');
Route::post('/saveregister', [App\Http\Controllers\LoginController::class, 'saveregister'])->name('saveregister');

Route::group(['middleware' => ['auth:user']], function(){
    
    Route::get('/home', function () {
        return view('home');
    });

    Route::get('/resep', [App\Http\Controllers\ResepController::class, 'index'])->name('resep');
    Route::get('/tulis', [App\Http\Controllers\ProfileController::class, 'tulis'])->name('tulis');
    Route::get('/profil', [App\Http\Controllers\ProfileController::class, 'index'])->name('profil');
    Route::get('/cooksnap', [App\Http\Controllers\CooksnapController::class, 'index'])->name('cooksnap');
    Route::get('/tips', [App\Http\Controllers\TipsController::class, 'index'])->name('tips');
    Route::get('/resep/tulis','App\Http\Controllers\ResepController@create');
    Route::patch('/resep','App\Http\Controllers\ResepController@store');
    Route::get('/profil/edit/{id}','App\Http\Controllers\ProfileController@edit');
    Route::patch('/profil/{id}','App\Http\Controllers\ProfileController@update');
    Route::get('/tips/tulis','App\Http\Controllers\TipsController@create');
    Route::patch('/tips','App\Http\Controllers\TipsController@store');    
});

Route::group(['middleware' => ['auth:admin']], function(){
    
    Route::get('/admin', function () {
        return view('admin.admin');
    });
    Route::get('/user', [App\Http\Controllers\UserController::class, 'index'])->name('user');
    Route::get('/aktivitas',[App\Http\Controllers\AktivitasController::class, 'index'])->name('aktivitas');
    Route::get('/infolomba',[App\Http\Controllers\InfolombaController::class, 'index'])->name('infolomba');
    Route::get('/bahanpilihan',[App\Http\Controllers\BahanpilihanController::class, 'index'])->name('bahanpilihan');
    Route::get('/aktivitas/tambah','App\Http\Controllers\AktivitasController@create');
    Route::patch('/aktivitas','App\Http\Controllers\AktivitasController@store');
    Route::get('/infolomba/tambah','App\Http\Controllers\InfolombaController@create');
    Route::patch('/infolomba','App\Http\Controllers\InfolombaController@store');
    Route::get('/bahanpilihan/tambah','App\Http\Controllers\BahanpilihanController@create');
    Route::patch('/bahanpilihan','App\Http\Controllers\BahanpilihanController@store');  
    
});