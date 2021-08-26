<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::post('/register', 'App\Http\Controllers\Api\UserController@register');
Route::post('/login', 'App\Http\Controllers\Api\UserController@login');

// Route::get('products', 'App\Http\Controllers\API\ProductsController@index');
// Route::middleware('auth:api')->group(function() {
//     Route::get('profile','App\Http\Controllers\API\UserController@profile');
// });

//BARANG
Route::get('/barang', 'App\Http\Controllers\Api\BarangController@index');
Route::get('/barang/terbaru', 'App\Http\Controllers\Api\BarangController@baru');
Route::get('/barang/details/{id}', 'App\Http\Controllers\Api\BarangController@details');
Route::get('/barang/tanaman', 'App\Http\Controllers\Api\BarangController@tanaman');
Route::get('/barang/nontanaman', 'App\Http\Controllers\Api\BarangController@nontanaman');
Route::get('/barang/vas', 'App\Http\Controllers\Api\BarangController@pot');
Route::get('/barang/pupuk', 'App\Http\Controllers\Api\BarangController@pupuk');
Route::get('/barang/titip', 'App\Http\Controllers\Api\BarangController@titip');
Route::get('/barang/rak', 'App\Http\Controllers\Api\BarangController@rak');
Route::get('/barang/dekorasi', 'App\Http\Controllers\Api\BarangController@dekorasi');

//BankData
Route::get('/bankdata', 'App\Http\Controllers\Api\BankDataController@index');
Route::get('/bankdata/details/{id}', 'App\Http\Controllers\Api\BankDataController@details');

//Keranjang
Route::get('/keranjang', 'App\Http\Controllers\Api\KeranjangController@index');
Route::get('/keranjang/hitung', 'App\Http\Controllers\Api\KeranjangController@jumlah');
Route::post('/keranjang/create', 'App\Http\Controllers\Api\KeranjangController@store');
Route::delete('/keranjang/delete/{id}', 'App\Http\Controllers\Api\KeranjangController@delete');
Route::get('/keranjang/total', 'App\Http\Controllers\Api\KeranjangController@total');

//Tips
Route::get('/tips', 'App\Http\Controllers\Api\TipsController@index');
Route::get('/tips/detail/{id}', 'App\Http\Controllers\Api\TipsController@detail');

//Sold
Route::get('/sold', 'App\Http\Controllers\Api\SoldController@index');

//Dekor
Route::get('/dekor', 'App\Http\Controllers\Api\DekorController@index');
