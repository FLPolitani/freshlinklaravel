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

Route::resource('agamaFromTables', 'Agama--fromTableController');

Route::resource('agamas', 'AgamaController');

Route::resource('articles', 'ArticleController');

Route::resource('biodatas', 'BiodataController');

Route::resource('dataUsahas', 'DataUsahaController');

Route::resource('detailPenjualans', 'DetailPenjualanController');

Route::resource('detailPurchaseOrders', 'DetailPurchaseOrdersController');

Route::resource('detailPurchaseOrders', 'DetailPurchaseOrderController');

Route::resource('jenisPembayarans', 'JenisPembayaranController');

Route::resource('jenisProduks', 'JenisProdukController');

Route::resource('kategoris', 'KategoriController');

Route::resource('kontaks', 'KontaksController');

Route::resource('pembelis', 'PembeliController');

Route::resource('produks', 'ProdukController');

Route::resource('purchaseOrders', 'PurchaseOrderController');

Route::resource('satuans', 'SatuanController');

Route::resource('satuanPenjualans', 'SatuanPenjualanController');

Route::resource('transaksiPenjualans', 'TransaksiPenjualanController');

Route::resource('transPenHasJenPembayarans', 'TransPenHasJenPembayaranController');

Route::resource('transPenHasStatusPenjualans', 'TransPenHasStatusPenjualanController');

Route::resource('permissionRoles', 'PermissionRoleController');

Route::resource('permissions', 'PermissionController');

Route::resource('roles', 'RoleController');