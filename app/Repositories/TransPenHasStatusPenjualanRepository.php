<?php

namespace App\Repositories;

use App\Models\TransPenHasStatusPenjualan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TransPenHasStatusPenjualanRepository
 * @package App\Repositories
 * @version November 24, 2018, 7:05 am UTC
 *
 * @method TransPenHasStatusPenjualan findWithoutFail($id, $columns = ['*'])
 * @method TransPenHasStatusPenjualan find($id, $columns = ['*'])
 * @method TransPenHasStatusPenjualan first($columns = ['*'])
*/
class TransPenHasStatusPenjualanRepository extends BaseRepository
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
        return TransPenHasStatusPenjualan::class;
    }
}
