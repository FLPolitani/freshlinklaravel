<?php

namespace App\Repositories;

use App\Models\TranspenjHasJenpembayaran;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TranspenjHasJenpembayaranRepository
 * @package App\Repositories
 * @version April 5, 2018, 5:35 am UTC
 *
 * @method TranspenjHasJenpembayaran findWithoutFail($id, $columns = ['*'])
 * @method TranspenjHasJenpembayaran find($id, $columns = ['*'])
 * @method TranspenjHasJenpembayaran first($columns = ['*'])
*/
class TranspenjHasJenpembayaranRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'transaksi_penjualans_id',
        'jenis_pembayarans_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TranspenjHasJenpembayaran::class;
    }
}
