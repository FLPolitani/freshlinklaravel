<?php

namespace App\Repositories;

use App\Models\JenisProduk;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class JenisProdukRepository
 * @package App\Repositories
 * @version November 24, 2018, 6:20 am UTC
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
