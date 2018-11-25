<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class PermissionRole
 * @package App\Models
 * @version April 5, 2018, 5:24 am UTC
 *
 * @property \App\Models\Permission permission
 * @property \App\Models\Role role
 * @property \Illuminate\Database\Eloquent\Collection biodatas
 * @property \Illuminate\Database\Eloquent\Collection petaniHasProduk
 * @property \Illuminate\Database\Eloquent\Collection roleUser
 * @property \Illuminate\Database\Eloquent\Collection transaksiPenjualansHasJenisPembayarans
 * @property integer role_id
 */
class PermissionRole extends Model
{
    use SoftDeletes;

    public $table = 'permission_role';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'role_id'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'permission_id' => 'integer',
        'role_id' => 'integer'
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
    public function permission()
    {
        return $this->belongsTo(\App\Models\Permission::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function role()
    {
        return $this->belongsTo(\App\Models\Role::class);
    }
}
