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

Route::group(['middleware' => 'jwt.auth'], function () {
    Route::get('user', 'UserAPIController@getAuthUser');
    Route::resource('users', 'UserAPIController',['except' => [
        'create','show','update'
    ]]);

    Route::get('users/show','UserAPIController@show');

    Route::post('users/update','UserAPIController@update');

    Route::post('users/password','UserAPIController@changePassword');

    Route::post('token_device','UserAPIController@storeTokenDevice');

    Route::resource('pembelis', 'PembeliAPIController');
});

Route::post('register','UserAPIController@store');

Route::post('token','AuthenticateAPIController@authenticate');

Route::resource('users', 'UserAPIController');

Route::resource('agamas', 'AgamaAPIController');

Route::resource('articles', 'ArticleAPIController');

Route::resource('agamas', 'AgamaAPIController');

Route::resource('biodatas', 'BiodataAPIController');

Route::resource('data_usahas', 'DataUsahaAPIController');

Route::resource('detail_penjualans', 'DetailPenjualanAPIController');

Route::resource('detail_purchase_orders', 'DetailPurchaseOrderAPIController');

Route::resource('jenis_pembayarans', 'JenisPembayaranAPIController');

Route::resource('jenis_produks', 'JenisProdukAPIController');

Route::resource('kategoris', 'KategoriAPIController');

Route::resource('kontaks', 'KontakAPIController');

Route::resource('permissions', 'PermissionAPIController');

Route::resource('permission_roles', 'PermissionRoleAPIController');

Route::resource('satuans', 'SatuanAPIController');

Route::resource('status_penjualans', 'StatusPenjualanAPIController');

Route::resource('transaksi_penjualans', 'TransaksiPenjualanAPIController');

Route::resource('transpenj_has_jenpembayarans', 'TranspenjHasJenpembayaranAPIController');

Route::resource('transpenj_has_status_penjualans', 'TranspenjHasStatusPenjualanAPIController');

Route::resource('produks', 'ProdukAPIController');

Route::resource('roles', 'RoleAPIController');

Route::resource('purchase_orders', 'PurchaseOrdersAPIController');