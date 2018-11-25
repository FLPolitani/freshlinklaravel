<?php

namespace App\Repositories;

use App\Models\Kontak;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KontakRepository
 * @package App\Repositories
 * @version April 4, 2018, 8:00 am UTC
 *
 * @method Kontak findWithoutFail($id, $columns = ['*'])
 * @method Kontak find($id, $columns = ['*'])
 * @method Kontak first($columns = ['*'])
*/
class KontakRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nomor',
        'biodatas_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Kontak::class;
    }
}
