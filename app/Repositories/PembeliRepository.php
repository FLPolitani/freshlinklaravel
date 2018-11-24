<?php

namespace App\Repositories;

use App\Models\Pembeli;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class PembeliRepository
 * @package App\Repositories
 * @version November 24, 2018, 6:23 am UTC
 *
 * @method Pembeli findWithoutFail($id, $columns = ['*'])
 * @method Pembeli find($id, $columns = ['*'])
 * @method Pembeli first($columns = ['*'])
*/
class PembeliRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'users_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Pembeli::class;
    }
}
