<?php

namespace App\Repositories;

use App\Models\TranspenjHasStatusPenjualan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TranspenjHasStatusPenjualanRepository
 * @package App\Repositories
 * @version April 5, 2018, 5:38 am UTC
 *
 * @method TranspenjHasStatusPenjualan findWithoutFail($id, $columns = ['*'])
 * @method TranspenjHasStatusPenjualan find($id, $columns = ['*'])
 * @method TranspenjHasStatusPenjualan first($columns = ['*'])
*/
class TranspenjHasStatusPenjualanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'transaksi_penjualans_id',
        'status_penjualans_id',
        'users_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TranspenjHasStatusPenjualan::class;
    }
}
