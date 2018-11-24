<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::resource('agamas', 'AgamaAPIController');

Route::resource('articles', 'ArticleAPIController');

Route::resource('biodatas', 'BiodataAPIController');

Route::resource('data_usahas', 'DataUsahaAPIController');

Route::resource('detail_penjualans', 'DetailPenjualanAPIController');


Route::resource('detail_purchase_orders', 'DetailPurchaseOrderAPIController');

Route::resource('jenis_pembayarans', 'JenisPembayaranAPIController');

Route::resource('jenis_produks', 'JenisProdukAPIController');

Route::resource('kategoris', 'KategoriAPIController');

Route::resource('kontaks', 'KontaksAPIController');

Route::resource('pembelis', 'PembeliAPIController');