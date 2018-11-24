<?php

namespace App\Repositories;

use App\Models\Kontaks;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KontaksRepository
 * @package App\Repositories
 * @version November 24, 2018, 6:22 am UTC
 *
 * @method Kontaks findWithoutFail($id, $columns = ['*'])
 * @method Kontaks find($id, $columns = ['*'])
 * @method Kontaks first($columns = ['*'])
*/
class KontaksRepository extends BaseRepository
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
        return Kontaks::class;
    }
}
