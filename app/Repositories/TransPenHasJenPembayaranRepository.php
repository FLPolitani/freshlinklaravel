<?php

namespace App\Repositories;

use App\Models\TransPenHasJenPembayaran;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TransPenHasJenPembayaranRepository
 * @package App\Repositories
 * @version November 24, 2018, 7:03 am UTC
 *
 * @method TransPenHasJenPembayaran findWithoutFail($id, $columns = ['*'])
 * @method TransPenHasJenPembayaran find($id, $columns = ['*'])
 * @method TransPenHasJenPembayaran first($columns = ['*'])
*/
class TransPenHasJenPembayaranRepository extends BaseRepository
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
        return TransPenHasJenPembayaran::class;
    }
}
