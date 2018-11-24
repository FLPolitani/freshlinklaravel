<?php

namespace App\Repositories;

use App\Models\Produk;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ProdukRepository
 * @package App\Repositories
 * @version November 24, 2018, 6:51 am UTC
 *
 * @method Produk findWithoutFail($id, $columns = ['*'])
 * @method Produk find($id, $columns = ['*'])
 * @method Produk first($columns = ['*'])
*/
class ProdukRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'jenis_produk_id',
        'satuan_terkecil_id',
        'kategori_id',
        'keterangan',
        'harga_petani',
        'harga_jual',
        'foto'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Produk::class;
    }
}
