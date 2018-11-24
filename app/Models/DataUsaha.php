<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class DataUsaha
 * @package App\Models
 * @version November 24, 2018, 6:04 am UTC
 *
 * @property \App\Models\User user
 * @property \Illuminate\Database\Eloquent\Collection biodatas
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection petaniHasProduk
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection transaksiPenjualansHasJenisPembayarans
 * @property integer user_id
 * @property string nama
 * @property string jenis
 * @property string kontak
 * @property string alamat
 * @property string npwp_usaha
 * @property string scan_npwp
 * @property string nomor_siup
 * @property string scan_siup
 * @property string nomor_situ
 * @property string scan_situ
 */
class DataUsaha extends Model
{
    use SoftDeletes;

    public $table = 'data_usaha';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'user_id',
        'nama',
        'jenis',
        'kontak',
        'alamat',
        'npwp_usaha',
        'scan_npwp',
        'nomor_siup',
        'scan_siup',
        'nomor_situ',
        'scan_situ'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'nama' => 'string',
        'jenis' => 'string',
        'kontak' => 'string',
        'alamat' => 'string',
        'npwp_usaha' => 'string',
        'scan_npwp' => 'string',
        'nomor_siup' => 'string',
        'scan_siup' => 'string',
        'nomor_situ' => 'string',
        'scan_situ' => 'string'
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
    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }
}
