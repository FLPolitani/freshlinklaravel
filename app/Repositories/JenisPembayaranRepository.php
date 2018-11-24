<?php

namespace App\Repositories;

use App\Models\JenisPembayaran;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class JenisPembayaranRepository
 * @package App\Repositories
 * @version November 24, 2018, 6:19 am UTC
 *
 * @method JenisPembayaran findWithoutFail($id, $columns = ['*'])
 * @method JenisPembayaran find($id, $columns = ['*'])
 * @method JenisPembayaran first($columns = ['*'])
*/
class JenisPembayaranRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'keterangan'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return JenisPembayaran::class;
    }
}
