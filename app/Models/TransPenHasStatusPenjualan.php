<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TransPenHasStatusPenjualan
 * @package App\Models
 * @version November 24, 2018, 7:05 am UTC
 *
 * @property \App\Models\StatusPenjualan statusPenjualan
 * @property \App\Models\TransaksiPenjualan transaksiPenjualan
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection biodatas
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection petaniHasProduk
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection transaksiPenjualansHasJenisPembayarans
 * @property integer transaksi_penjualans_id
 * @property integer status_penjualans_id
 * @property integer users_id
 */
class TransPenHasStatusPenjualan extends Model
{
    use SoftDeletes;

    public $table = 'transaksi_penjualans_has_status_penjualans';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'transaksi_penjualans_id',
        'status_penjualans_id',
        'users_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'transaksi_penjualans_id' => 'integer',
        'status_penjualans_id' => 'integer',
        'users_id' => 'integer'
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
    public function statusPenjualan()
    {
        return $this->belongsTo(\App\Models\StatusPenjualan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function transaksiPenjualan()
    {
        return $this->belongsTo(\App\Models\TransaksiPenjualan::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
