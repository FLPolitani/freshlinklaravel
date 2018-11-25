<?php

namespace App\Repositories;

use App\Models\JenisProduk;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class JenisProdukRepository
 * @package App\Repositories
 * @version April 4, 2018, 7:58 am UTC
 *
 * @method JenisProduk findWithoutFail($id, $columns = ['*'])
 * @method JenisProduk find($id, $columns = ['*'])
 * @method JenisProduk first($columns = ['*'])
*/
class JenisProdukRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_jenis_produk'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return JenisProduk::class;
    }
}
