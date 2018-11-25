<?php

namespace App\Repositories;

use App\Models\Kategori;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class KategoriRepository
 * @package App\Repositories
 * @version April 4, 2018, 7:59 am UTC
 *
 * @method Kategori findWithoutFail($id, $columns = ['*'])
 * @method Kategori find($id, $columns = ['*'])
 * @method Kategori first($columns = ['*'])
*/
class KategoriRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nama',
        'parent_kategori_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Kategori::class;
    }
}
