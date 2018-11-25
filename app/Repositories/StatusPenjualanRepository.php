<?php

namespace App\Repositories;

use App\Models\StatusPenjualan;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class StatusPenjualanRepository
 * @package App\Repositories
 * @version April 5, 2018, 5:29 am UTC
 *
 * @method StatusPenjualan findWithoutFail($id, $columns = ['*'])
 * @method StatusPenjualan find($id, $columns = ['*'])
 * @method StatusPenjualan first($columns = ['*'])
*/
class StatusPenjualanRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama_status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return StatusPenjualan::class;
    }
}
