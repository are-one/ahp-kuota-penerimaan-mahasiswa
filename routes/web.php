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
        return view('home');
    });

    Route::get('/home', function () {
        return view('home');
    });

    Route::get('/tahun_akademik/json', 'TahunakademikController@json');
    Route::get('/prodi/json', 'ProdiController@json');
    Route::get('/kriteria/json', 'KriteriaController@json');

    Route::resource('/tahun_akademik', 'TahunakademikController');
    Route::resource('/prodi', 'ProdiController');
    Route::get('/dashboard', 'AdminController@dashboard');
    Route::get('/dosen_aktif', 'DosenController@index');
    Route::resource('/kriteria', 'KriteriaController');
    Route::get('/kriteria/create', 'KriteriaController@create');
    Route::get('/pembobotan', 'BobotController@index');
    Route::post('/pembobotan', 'BobotController@index');
    Route::get('/hasil_penilaian', 'HasilpenilaianController@index');
    Route::post('/hasil_penilaian', 'HasilpenilaianController@index');
    Route::post('simpandata', 'ProdiController@simpandata')->name('simpandata');
});
