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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/barang', 'PageController@barang');
Route::get('/barang/add', 'BarangController@add');
Route::post('/barang/store', 'BarangController@store');
Route::get('/barang/edit/{id_barang}', 'BarangController@edit');
Route::post('/barang/update/{id_barang}', 'BarangController@update');
Route::get('/barang/delete/{id_barang}', 'BarangController@delete');

Route::get('/penjualan', 'PageController@penjualan');
Route::get('/penjualan/add', 'PenjualanController@add');
Route::post('/penjualan/store', 'PenjualanController@store');
Route::get('/penjualan/edit/{id_penjualan}', 'PenjualanController@edit');
Route::post('/penjualan/update/{id_penjualan}', 'PenjualanController@update');
Route::get('/penjualan/delete/{id_penjualan}', 'PenjualanController@delete');