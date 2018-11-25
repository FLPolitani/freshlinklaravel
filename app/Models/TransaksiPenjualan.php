<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TransaksiPenjualan
 * @package App\Models
 * @version April 5, 2018, 5:30 am UTC
 *
 * @property \App\Models\PurchaseOrder purchaseOrder
 * @property \Illuminate\Database\Eloquent\Collection biodatas
 * @property \Illuminate\Database\Eloquent\Collection DetailPenjualan
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection petaniHasProduk
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection TransaksiPenjualansHasJenisPembayaran
 * @property \Illuminate\Database\Eloquent\Collection TransaksiPenjualansHasStatusPenjualan
 * @property integer purchase_orders_id
 */
class TransaksiPenjualan extends Model
{
    use SoftDeletes;

    public $table = 'transaksi_penjualans';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'purchase_orders_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'purchase_orders_id' => 'integer'
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
    public function purchaseOrder()
    {
        return $this->belongsTo(\App\Models\PurchaseOrder::class);
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
    public function transaksiPenjualansHasJenisPembayarans()
    {
        return $this->hasMany(\App\Models\TransaksiPenjualansHasJenisPembayaran::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function transaksiPenjualansHasStatusPenjualans()
    {
        return $this->hasMany(\App\Models\TransaksiPenjualansHasStatusPenjualan::class);
    }
}
