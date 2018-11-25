<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DetailPurchaseOrder
 * @package App\Models
 * @version April 4, 2018, 7:54 am UTC
 *
 * @property \App\Models\Produk produk
 * @property \App\Models\PurchaseOrder purchaseOrder
 * @property \App\Models\Satuan satuan
 * @property \Illuminate\Database\Eloquent\Collection biodatas
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection petaniHasProduk
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection transaksiPenjualansHasJenisPembayarans
 * @property integer purchase_orders_id
 * @property integer produk_id
 * @property integer jumlah
 * @property integer satuan_id
 * @property integer harga_jual
 */
class DetailPurchaseOrder extends Model
{
    use SoftDeletes;

    public $table = 'detail_purchase_orders';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'purchase_orders_id',
        'produk_id',
        'jumlah',
        'satuan_id',
        'harga_jual'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'purchase_orders_id' => 'integer',
        'produk_id' => 'integer',
        'jumlah' => 'integer',
        'satuan_id' => 'integer',
        'harga_jual' => 'integer'
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
    public function produk()
    {
        return $this->belongsTo(\App\Models\Produk::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function purchaseOrder()
    {
        return $this->belongsTo(\App\Models\PurchaseOrders::class,'purchase_orders_id','id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function satuan()
    {
        return $this->belongsTo(\App\Models\Satuan::class);
    }
}
