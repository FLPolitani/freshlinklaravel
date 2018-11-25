<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Produk
 * @package App\Models
 * @version April 17, 2018, 3:36 am UTC
 *
 * @property \App\Models\Kategori kategori
 * @property \App\Models\Satuan satuan
 * @property \App\Models\JenisProduk jenisProduk
 * @property \Illuminate\Database\Eloquent\Collection biodatas
 * @property \Illuminate\Database\Eloquent\Collection DetailPenjualan
 * @property \Illuminate\Database\Eloquent\Collection DetailPurchaseOrder
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection petaniHasProduk
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection transaksiPenjualansHasJenisPembayarans
 * @property string nama
 * @property integer jenis_produk_id
 * @property integer satuan_terkecil_id
 * @property integer kategori_id
 * @property string keterangan
 * @property integer harga_petani
 * @property integer harga_jual
 */
class Produk extends Model
{
    use SoftDeletes;

    public $table = 'produk';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'jenis_produk_id',
        'satuan_terkecil_id',
        'kategori_id',
        'keterangan',
        'harga_petani',
        'harga_jual',
        'foto'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'jenis_produk_id' => 'integer',
        'satuan_terkecil_id' => 'integer',
        'kategori_id' => 'integer',
        'keterangan' => 'string',
        'harga_petani' => 'integer',
        'harga_jual' => 'integer',
        'foto' => 'string'
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
    public function kategori()
    {
        return $this->belongsTo(\App\Models\Kategori::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function satuan()
    {
        return $this->belongsTo(\App\Models\Satuan::class,'satuan_terkecil_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function jenisProduk()
    {
        return $this->belongsTo(\App\Models\JenisProduk::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detailPenjualans()
    {
        return $this->hasMany(\App\Models\DetailPenjualan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function detailPurchaseOrders()
    {
        return $this->hasMany(\App\Models\DetailPurchaseOrder::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function petanis()
    {
        return $this->belongsToMany(\App\Models\Petani::class, 'petani_has_produk');
    }
}
