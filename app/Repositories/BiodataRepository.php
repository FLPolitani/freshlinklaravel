<?php

namespace App\Repositories;

use App\Models\Biodata;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class BiodataRepository
 * @package App\Repositories
 * @version November 24, 2018, 6:02 am UTC
 *
 * @method Biodata findWithoutFail($id, $columns = ['*'])
 * @method Biodata find($id, $columns = ['*'])
 * @method Biodata first($columns = ['*'])
*/
class BiodataRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'users_id',
        'nik',
        'tanggal_lahir',
        'jenis_kelamin',
        'status_perkawinan',
        'pendidikan_terakhir',
        'agama_id',
        'foto',
        'kontak',
        'longitude',
        'latitude'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Biodata::class;
    }
}
