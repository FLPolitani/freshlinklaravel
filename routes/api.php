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
Route::post('token','AuthenticateController@authenticate');
Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user', 'AuthenticateController@getAuthenticatedUser');


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

Route::resource('produks', 'ProdukAPIController');

Route::resource('purchase_orders', 'PurchaseOrderAPIController');

Route::resource('satuans', 'SatuanAPIController');

Route::resource('satuan_penjualans', 'SatuanPenjualanAPIController');

Route::resource('transaksi_penjualans', 'TransaksiPenjualanAPIController');

Route::resource('trans_pen_has_jen_pembayarans', 'TransPenHasJenPembayaranAPIController');

Route::resource('trans_pen_has_status_penjualans', 'TransPenHasStatusPenjualanAPIController');

Route::resource('permission_roles', 'PermissionRoleAPIController');

Route::resource('permissions', 'PermissionAPIController');

Route::resource('roles', 'RoleAPIController');
});