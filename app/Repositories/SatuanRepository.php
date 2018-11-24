<?php

namespace App\Repositories;

use App\Models\Satuan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class SatuanRepository
 * @package App\Repositories
 * @version November 24, 2018, 6:53 am UTC
 *
 * @method Satuan findWithoutFail($id, $columns = ['*'])
 * @method Satuan find($id, $columns = ['*'])
 * @method Satuan first($columns = ['*'])
*/
class SatuanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Satuan::class;
    }
}
