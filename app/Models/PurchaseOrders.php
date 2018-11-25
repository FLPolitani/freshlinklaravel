<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PurchaseOrders
 * @package App\Models
 * @version May 29, 2018, 7:17 am UTC
 *
 * @property \App\Models\Pembeli pembeli
 * @property \Illuminate\Database\Eloquent\Collection biodatas
 * @property \Illuminate\Database\Eloquent\Collection DetailPurchaseOrder
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection petaniHasProduk
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection TransaksiPenjualan
 * @property \Illuminate\Database\Eloquent\Collection transaksiPenjualansHasJenisPembayarans
 * @property integer pembeli_id
 */
class PurchaseOrders extends Model
{
    use SoftDeletes;

    public $table = 'purchase_orders';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'pembeli_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'pembeli_id' => 'integer'
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
    public function pembeli()
    {
        return $this->belongsTo(\App\Models\Pembeli::class);
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
    public function transaksiPenjualans()
    {
        return $this->hasMany(\App\Models\TransaksiPenjualan::class);
    }
}
