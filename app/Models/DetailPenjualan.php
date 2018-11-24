<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DetailPenjualan
 * @package App\Models
 * @version November 24, 2018, 6:05 am UTC
 *
 * @property \App\Models\Petani petani
 * @property \App\Models\Produk produk
 * @property \App\Models\Satuan satuan
 * @property \App\Models\TransaksiPenjualan transaksiPenjualan
 * @property \Illuminate\Database\Eloquent\Collection biodatas
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection petaniHasProduk
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection transaksiPenjualansHasJenisPembayarans
 * @property integer produk_id
 * @property integer jumlah
 * @property integer satuan_id
 * @property integer transaksi_penjualans_id
 * @property integer harga_petani
 * @property integer harga_jual
 * @property integer petani_id
 */
class DetailPenjualan extends Model
{
    use SoftDeletes;

    public $table = 'detail_penjualans';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'produk_id',
        'jumlah',
        'satuan_id',
        'transaksi_penjualans_id',
        'harga_petani',
        'harga_jual',
        'petani_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'produk_id' => 'integer',
        'jumlah' => 'integer',
        'satuan_id' => 'integer',
        'transaksi_penjualans_id' => 'integer',
        'harga_petani' => 'integer',
        'harga_jual' => 'integer',
        'petani_id' => 'integer'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function petani()
    {
        return $this->belongsTo(\App\Models\Petani::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function produk()
    {
        return $this->belongsTo(\App\Models\Produk::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function satuan()
    {
        return $this->belongsTo(\App\Models\Satuan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function transaksiPenjualan()
    {
        return $this->belongsTo(\App\Models\TransaksiPenjualan::class);
    }
}
