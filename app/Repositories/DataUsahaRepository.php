<?php

namespace App\Repositories;

use App\Models\DataUsaha;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DataUsahaRepository
 * @package App\Repositories
 * @version November 24, 2018, 6:04 am UTC
 *
 * @method DataUsaha findWithoutFail($id, $columns = ['*'])
 * @method DataUsaha find($id, $columns = ['*'])
 * @method DataUsaha first($columns = ['*'])
*/
class DataUsahaRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'nama',
        'jenis',
        'kontak',
        'alamat',
        'npwp_usaha',
        'scan_npwp',
        'nomor_siup',
        'scan_siup',
        'nomor_situ',
        'scan_situ'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return DataUsaha::class;
    }
}
