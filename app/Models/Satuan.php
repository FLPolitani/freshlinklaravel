<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Satuan
 * @package App\Models
 * @version November 24, 2018, 6:53 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection biodatas
 * @property \Illuminate\Database\Eloquent\Collection DetailPenjualan
 * @property \Illuminate\Database\Eloquent\Collection DetailPurchaseOrder
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection petaniHasProduk
 * @property \Illuminate\Database\Eloquent\Collection Produk
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection transaksiPenjualansHasJenisPembayarans
 * @property string nama
 */
class Satuan extends Model
{
    use SoftDeletes;

    public $table = 'satuan';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

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
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function produks()
    {
        return $this->hasMany(\App\Models\Produk::class);
    }
}
