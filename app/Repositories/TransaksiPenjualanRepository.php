<?php

namespace App\Repositories;

use App\Models\TransaksiPenjualan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TransaksiPenjualanRepository
 * @package App\Repositories
 * @version April 5, 2018, 5:30 am UTC
 *
 * @method TransaksiPenjualan findWithoutFail($id, $columns = ['*'])
 * @method TransaksiPenjualan find($id, $columns = ['*'])
 * @method TransaksiPenjualan first($columns = ['*'])
*/
class TransaksiPenjualanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'purchase_orders_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TransaksiPenjualan::class;
    }
}
