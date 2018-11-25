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


Auth::routes();

Route::get('/home', 'HomeController@index');

Route::resource('agamas', 'AgamaController');

Route::resource('articles', 'ArticleController');

Route::resource('agamas', 'AgamaController');

Route::resource('biodatas', 'BiodataController');

Route::resource('dataUsahas', 'DataUsahaController');

Route::resource('detailPenjualans', 'DetailPenjualanController');

Route::resource('detailPurchaseOrders', 'DetailPurchaseOrderController');

Route::resource('jenisPembayarans', 'JenisPembayaranController');

Route::resource('jenisProduks', 'JenisProdukController');

Route::resource('kategoris', 'KategoriController');

Route::resource('kontaks', 'KontakController');

Route::resource('pembelis', 'PembeliController');

Route::resource('permissions', 'PermissionController');

Route::resource('permissionRoles', 'PermissionRoleController');

Route::resource('satuans', 'SatuanController');

Route::resource('statusPenjualans', 'StatusPenjualanController');

Route::resource('transaksiPenjualans', 'TransaksiPenjualanController');

Route::resource('transpenjHasJenpembayarans', 'TranspenjHasJenpembayaranController');

Route::resource('transpenjHasStatusPenjualans', 'TranspenjHasStatusPenjualanController');

Route::resource('produks', 'ProdukController');

Route::resource('produks', 'ProdukController');

Route::resource('roles', 'RoleController');

Route::resource('purchaseOrders', 'PurchaseOrdersController');