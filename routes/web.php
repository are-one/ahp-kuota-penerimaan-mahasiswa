<?php

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
    return view('welcome');
});

Route::get('/dashboard', 'AdminController@dashboard');
Route::get('/prodi', 'ProdiController@index');
Route::get('/dosen_aktif', 'DosenController@index');
Route::get('/ruangan', 'RuanganController@index');
Route::get('/pembobotan', 'BobotController@index');
Route::get('/hasil_penilaian', 'HasilpenilaianController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
