<?php

namespace App\Repositories;

use App\Models\SatuanPenjualan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SatuanPenjualanRepository
 * @package App\Repositories
 * @version November 24, 2018, 6:54 am UTC
 *
 * @method SatuanPenjualan findWithoutFail($id, $columns = ['*'])
 * @method SatuanPenjualan find($id, $columns = ['*'])
 * @method SatuanPenjualan first($columns = ['*'])
*/
class SatuanPenjualanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return SatuanPenjualan::class;
    }
}
