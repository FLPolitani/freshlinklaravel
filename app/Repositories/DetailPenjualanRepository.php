<?php

namespace App\Repositories;

use App\Models\DetailPenjualan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DetailPenjualanRepository
 * @package App\Repositories
 * @version April 4, 2018, 7:52 am UTC
 *
 * @method DetailPenjualan findWithoutFail($id, $columns = ['*'])
 * @method DetailPenjualan find($id, $columns = ['*'])
 * @method DetailPenjualan first($columns = ['*'])
*/
class DetailPenjualanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'produk_id',
        'jumlah',
        'satuan_id',
        'transaksi_penjualans_id',
        'harga_petani',
        'harga_jual',
        'petani_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DetailPenjualan::class;
    }
}
