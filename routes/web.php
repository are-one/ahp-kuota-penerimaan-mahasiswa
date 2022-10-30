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



Route::get('/login', function () {
    return view('admin.login');
})->name('login');

Route::post('/postlogin', 'LoginController@postlogin')->name('postlogin');
Route::get('/logout', 'LoginController@logout')->name('logout');

Route::group(['middleware' => ['auth:web']], function () {
    Route::get('/', function () {
        return view('welcome');
    });
    Route::get('/dashboard', 'AdminController@dashboard');
    Route::get('/prodi/json', 'ProdiController@json');
    Route::resource('/prodi', 'ProdiController');
    Route::get('/prodi/create', 'ProdiController@create');
    Route::get('/dosen_aktif', 'DosenController@index');
    Route::get('/ruangan', 'RuanganController@index');
    Route::get('/ruangan/create', 'RuanganController@create');
    Route::get('/pembobotan', 'BobotController@index');
    Route::post('/pembobotan', 'BobotController@index');
    Route::get('/hasil_penilaian', 'HasilpenilaianController@index');
});
