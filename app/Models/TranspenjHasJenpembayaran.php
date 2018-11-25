<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class TranspenjHasJenpembayaran
 * @package App\Models
 * @version April 5, 2018, 5:35 am UTC
 *
 * @property \App\Models\JenisPembayaran jenisPembayaran
 * @property \App\Models\TransaksiPenjualan transaksiPenjualan
 * @property \Illuminate\Database\Eloquent\Collection biodatas
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection petaniHasProduk
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property integer transaksi_penjualans_id
 * @property integer jenis_pembayarans_id
 */
class TranspenjHasJenpembayaran extends Model
{
    use SoftDeletes;

    public $table = 'transaksi_penjualans_has_jenis_pembayarans';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'transaksi_penjualans_id',
        'jenis_pembayarans_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'transaksi_penjualans_id' => 'integer',
        'jenis_pembayarans_id' => 'integer'
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
    public function jenisPembayaran()
    {
        return $this->belongsTo(\App\Models\JenisPembayaran::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function transaksiPenjualan()
    {
        return $this->belongsTo(\App\Models\TransaksiPenjualan::class);
    }
}
