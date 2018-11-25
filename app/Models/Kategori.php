<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Kategori
 * @package App\Models
 * @version April 4, 2018, 7:59 am UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection biodatas
 * @property \Illuminate\Database\Eloquent\Collection permissionRole
 * @property \Illuminate\Database\Eloquent\Collection petaniHasProduk
 * @property \Illuminate\Database\Eloquent\Collection Produk
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection transaksiPenjualansHasJenisPembayarans
 * @property string nama
 * @property integer parent_kategori_id
 */
class Kategori extends Model
{
    use SoftDeletes;

    public $table = 'kategori';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nama',
        'parent_kategori_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nama' => 'string',
        'parent_kategori_id' => 'integer'
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
    public function produks()
    {
        return $this->hasMany(\App\Models\Produk::class);
    }
}
